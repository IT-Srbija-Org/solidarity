import ServiceInvoiceEntity from "./ServiceInvoiceEntity.js";
import ClientInvoiceEntity from "./ClientInvoiceEntity.js";

export default class InvoiceForm {
    invoiceTypes = {
        local: '1',
        foreign: '2'
    };
    services = {};
    selectedServices = {};
    activeClient = null;
    // dt = luxon.DateTime;
    form = 'invoiceForm';
    submitButton = 'submitButton';
    serviceDeletedEventName = 'serviceDeleted';
    recalculationRequiredEventName = 'recalculationRequired';
    contractUsedEventName = 'contractUsed';
    totalWithoutVATInput = document.getElementById('totalWithoutVAT');
    totalVATInput = document.getElementById('totalVAT');
    totalWithVATInput = document.getElementById('totalWithVAT');
    advanceInput = document.getElementById('advance');
    totalWithVATAfterAdvanceInput = document.getElementById('totalWithVATAfterAdvance');
    loader = document.getElementById('loader');
    clientSelect = document.getElementById('donor');
    servicesSelect = document.getElementById('services');
    selectedServicesContainer = document.getElementById('selectedServices');
    clientNameInput = document.getElementsByName('clientName')[0];
    clientAddressInput = document.getElementsByName('clientAddress')[0];
    clientCityInput = document.getElementsByName('clientCity')[0];
    clientCountryInput = document.getElementsByName('clientCountry')[0];
    clientVatIdInput = document.getElementsByName('clientVatId')[0];
    clientVatInput = document.getElementsByName('clientVat')[0];
    issueDateInput = document.querySelector('input[name="issueDate"]');
    turnoverDateInput = document.querySelector('input[name="turnoverDate"]');
    deadlineDateInput = document.querySelector('input[name="deadlineDate"]');
    status = document.querySelector('#status').dataset;
    descriptionInput = document.querySelector('textarea[name="description"]');
    daysDeadlineElement = document.querySelector('.deadlineDaysContainer');
    typeSelect = document.querySelector('#crudForm select[name="type"]');
    currencySelect = document.querySelector('#crudForm select[name="currency"]');

    storedTaxPercentage = 0;

    constructor() {
        this.initHandlers();
    }

    initHandlers() {
        this.setDeadlineNumber();
        this.addCurrencyChangeListener();
        this.handleTypeChange();
        this.addTypeChangeListener();
        this.registerSelectedClient().then(() => {
            this.loadServiceList();
            this.selectedServicesHandler();
            this.fillClientInfoForInvoice();
            this.addDispatchedEventListeners();
            this.addAdvanceListener();
            this.addDateListeners();
        });
    }

    handleTypeChange() {
        if(parseInt(this.status.value) > 2) {
            this.currencySelect.disabled = true;
            this.typeSelect.disabled = true;
            return;
        }
        switch(this.typeSelect.value) {
            case this.invoiceTypes.local:
                this.handleCurrencyOptions(['rsd']);
                break;
            case this.invoiceTypes.foreign:
                this.handleCurrencyOptions(['usd','eur','gbp']);
                break;
        }
        this.currencySelect.querySelector('option:enabled').selected = true;
        // patch to refresh service data
        this.currencySelect.dispatchEvent(new Event('change'));
        this.setTaxPercentage();
    }

    setTaxPercentage() {
        Object.keys(this.selectedServices).forEach((index) => {
            let service = this.selectedServices[index];
            let inPdv = document.getElementById('inVatSystem').dataset.value;
            service.taxSelect.value = 0;
            if (this.typeSelect.value == 1 && inPdv == 1) {
                service.taxSelect.value = 20;
            }
        });
    }

    addCurrencyChangeListener() {
        this.currencySelect.addEventListener('change', () => {
            this.loadServiceList();
        });
    }

    addTypeChangeListener() {
        this.typeSelect.addEventListener('change', () => {
            this.handleTypeChange();
        });
    }

    handleCurrencyOptions(allowedValues) {
        let value = this.currencySelect.value;
        this.currencySelect.querySelectorAll('option').forEach((option) => {
            option.disabled = !allowedValues.includes(option.value);
            if (option.value === value && !allowedValues.includes(value)) {
                value = false;
            }
        });
        if (value) {
            this.currencySelect.value = value;
        }
    }

    loadServiceList() {
        let url = "/service/getEntities/?currency=" + this.currencySelect.value;
        this.fetchData(url, 'GET').then((services) => {
            services.forEach((service) => {
                let option = this.addToServicesProperty(service);
                this.servicesSelect.appendChild(option);
            })
        }).then(() => {this.registerExistingServices()});
    }

    async registerSelectedClient() {
        if(this.clientSelect.value !== '-1') {
            this.servicesSelect.disabled = false;
            let url = "/donor/getEntityData/" + this.clientSelect.value + "/";
            if (this.issueDateInput.value.length) {
                url += '?currency=' + this.currencySelect.value;
                await this.fetchData(url, 'GET').then((client) => {
                    this.activeClient = new ClientInvoiceEntity(client);
                });
            }
        } else {
            this.servicesSelect.disabled = true;
        }
    }

    addToServicesProperty(service) {
        if(!this.services[service.id]) {
            this.services[service.id] = new ServiceInvoiceEntity(
                service,
                document.getElementById('selectedServices'),
                this.serviceDeletedEventName,
                this.recalculationRequiredEventName,
                this.contractUsedEventName
            );
        }
        return this.services[service.id].getOptionElement();
    }

    registerExistingServices() {
        if(parseInt(this.status.value) > 3) {
            return;
        }
        let existingServices = document.querySelectorAll('.selectedService');
        existingServices.forEach((existingService) => {
            let service = this.services[Number(existingService.getAttribute('data-service-id'))];
            if (typeof service === 'undefined') {
                alert(`Usluga \'${existingService.querySelector('[name="selectedServices[name][]"]').value}\' je izgleda obrisana iz sistema, biće uklonjena.`);
                // existingService.remove();
                return;
            }
            service.initFromExisting(existingService);
            if(this.activeClient) {
                this.activeClient.getContract().forEach((contract) => {
                    if(contract.service.id === service.getServiceId()) {
                        if(contract.price) {
                            service.contract = contract;
                        }
                        service.enableUseContractForExisting();
                    }
                });
            }
            this.selectedServices[service.getServiceId()] = service;
        });
        this.recalculate();
    }

    selectedServicesHandler() {
        this.servicesSelect.addEventListener('change', async () =>  {
            let service = this.services[this.servicesSelect.value];
            let serviceContract = null;
            if(this.activeClient) {
                this.activeClient.getContract().forEach((contract) => {
                    if(contract.service.id === service.getServiceId()) {
                        serviceContract = contract;
                        if(contract.price) {
                            service.contract = contract;
                        }
                    }
                });
            }
            const selectedServices = this.selectedServicesContainer.querySelectorAll('.selectedService');
            const selectedServicesCount = selectedServices.length;
            if(selectedServices && selectedServicesCount > 0) {
                selectedServices[selectedServicesCount - 1].after(service.generateServiceElement());
            } else {
                this.selectedServicesContainer.prepend(service.generateServiceElement());
            }
            if(serviceContract && serviceContract.number) {
                service.nameInput.value +=
                    ` po ugovoru broj ${serviceContract.number ?? ''}`;
            }
            this.selectedServices[service.getServiceId()] = service;
            this.recalculate();
            this.servicesSelect.value = 0;
            this.setTaxPercentage();
            this.servicesSelect.value = '-1';
        });
    }

    fillClientInfoForInvoice() {
        if (this.clientSelect) {
            this.clientSelect.addEventListener('change', () => {
                this.servicesSelect.disabled = false;
                let selectedOption = this.clientSelect.options[this.clientSelect.selectedIndex];
                let clientId = selectedOption.value;
                let url = "/donor/getEntityData/" + clientId + "/?currency=" + this.currencySelect.value;
                // @TODO should always be reuired param
                // if (this.issueDateInput.value.length) {
                //     url += '?date=' + this.issueDateInput.value + '&currency=' + this.currencySelect.value;
                // }
                this.fetchData(url, 'GET').then((client) => {
                    this.activeClient = new ClientInvoiceEntity(client);
                    this.setClientFields();
                    this.propagateClientPriceChangeToServices();
                });
            });
        }
    }


    setClientFields() {
        this.clientNameInput.value = this.activeClient.getClientName();
        this.clientAddressInput.value = this.activeClient.getClientAddress();
        this.clientCityInput.value = this.activeClient.getClientCity();
        this.clientCountryInput.value = this.activeClient.getClientCountry();
        this.clientVatIdInput.value = this.activeClient.getClientId();
        this.clientVatInput.value = this.activeClient.getClientVat();
    }

    setDeadline(deadline = null) {
        if (this.issueDateInput.value) {
            if(!deadline) {
                deadline = '30';
                let checkedContract =  document.querySelector('.useContract[type="checkbox"]:checked');
                if(checkedContract) {
                    deadline = checkedContract.dataset.deadline;
                }
            }
            let dt = this.dt.fromISO(this.issueDateInput.value).plus({days: deadline});
            this.deadlineDateInput.value = dt.toISODate();
            this.daysDeadlineElement.innerText = deadline;
        }
    }

    propagateClientPriceChangeToServices() {
        let activeContracts = this.activeClient.getContract();
        Object.keys(this.selectedServices).forEach((index) => {
            let service = this.selectedServices[index];
            let price = service.price;
            let contract = null;
            activeContracts.forEach((activeContract) => {
               if(service.clientId === activeContract.clientId && service.serviceId === activeContract?.service?.id) {
                   contract = activeContract;
                   if(activeContract.price) {
                       price = activeContract.price.amount;
                   }
               }
            });
            service.contract = contract;
            if(contract === null) {
                service.disableUseContract();
            } else {
                service.enableUseContract();
            }
            service.priceInput.value = price;
        });
        this.recalculate();
    }

    addDispatchedEventListeners() {
        // Service Removed
        this.selectedServicesContainer.addEventListener(this.serviceDeletedEventName, (e) => {
            delete this.selectedServices[e.detail];
            this.recalculate();
        });
        // Recalculation required
        this.selectedServicesContainer.addEventListener(this.recalculationRequiredEventName, () => {
            this.recalculate();
        });

        this.selectedServicesContainer.addEventListener(this.contractUsedEventName, (e) => {
          if(e.detail.checked) {
              this.setDeadline(e.detail.contract.deadline);
          }
        });
    }

    addAdvanceListener() {
        // this.advanceInput.addEventListener('change', () => {
        //     this.recalculate();
        // });
    }


    addDateListeners() {
        this.issueDateInput.addEventListener('change', () => {
            this.setDeadline();
            this.validateTurnoverDate();
        })
        this.turnoverDateInput.addEventListener('change', () => {
            this.validateTurnoverDate();
        })
        this.deadlineDateInput.addEventListener('change', () => {
            this.validateDeadlineDate();
            this.setDeadlineNumber();
        })
    }

    validateTurnoverDate() {
        // If the turnover date is after the issue date set turnover value to issue date value
        if(this.dt.fromISO(this.turnoverDateInput.value) > this.dt.fromISO(this.issueDateInput.value)) {
            this.turnoverDateInput.value = this.issueDateInput.value;
        }
    }

    validateDeadlineDate() {
        let deadline = this.dt.fromISO(this.deadlineDateInput.value);
        let issue = this.dt.fromISO(this.issueDateInput.value);
        if(deadline <= issue) {
            let issuePlusOneDay = issue.plus({days: '1'});
            this.deadlineDateInput.value = issuePlusOneDay.toISODate();
        }
    }

    setDeadlineNumber() {
        this.daysDeadlineElement.innerText = this.getDeadlineIssueDateDifference();
    }

    getDeadlineIssueDateDifference() {
        return (new Date(this.deadlineDateInput.value) - new Date(this.issueDateInput.value)) / (1000*60*60*24);
    }

    recalculate() {
        // let advance = Number(document.getElementsByClassName('advance')[0].value);
        let advance = 0;
        let rowTotal = 0;
        let rowTax = 0;
        let baseTotal = 0;
        let taxTotal = 0;
        for (const key in this.selectedServices) {
            let selectedService = this.selectedServices[key];

            rowTotal = Number(selectedService.getPrice() * selectedService.getQty());
            rowTax = Number(rowTotal * Number('0.' + selectedService.getTax()));

            selectedService.getRowTotalInput().value = Number(rowTotal + Number(rowTax)).toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
            // selectedService.getBasePriceInput().value = Number(selectedService.getPrice() * selectedService.getQty()).toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
            selectedService.getRowTaxInput().value = rowTax.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});

            baseTotal = Number(baseTotal) + Number(rowTotal);
            taxTotal = Number(taxTotal) + Number(rowTax);
        }

        let total = Number(baseTotal) + Number(taxTotal);
        let grandTotal = Number(total) - Number(advance);
        if(Number(grandTotal) < 0) {
            this.totalWithVATAfterAdvanceInput.style.border = '1px solid var(--colorError)';
        } else {
            this.totalWithVATAfterAdvanceInput.style.border = '1px solid var(--colorPrimary-500)';
        }
        this.totalWithoutVATInput.value = baseTotal.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
        this.totalVATInput.value = taxTotal.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
        this.totalWithVATInput.value = total.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
        this.advanceInput.value = advance.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
        this.totalWithVATAfterAdvanceInput.value = grandTotal.toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
    }

    async fetchData(url, method, params = null) {
        const req = await fetch(url, {
            method: method,
            body: params
        });
        return JSON.parse(await req.text());
    }
}