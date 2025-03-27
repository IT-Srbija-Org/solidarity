<div id="mainTable">
    <?php echo $data['tableFilters']; ?>
    <div id="tableContainer">
        <div id="tableTop">
            <div class="tablePaginationContainer" id="tablePaginationContainerTop">

            </div>
            <div class="goToPageContainer">
                <label><?=$this->t('Page')?></label>
                <input type="number" class="goToPage input">
            </div>
            <div id="perPageContainer">
                <label><?=$this->t('Show')?></label>
                <select id="perPage" class="input">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                </select>
            </div>
            <div id="bulkActionsContainer">
                <label><?=$this->t('Bulk Actions')?></label>
                <select id="bulkActions" class="input"></select>
                <button class="btn primary" id="applyBulkActions"><?=$this->t('Apply')?></button>
            </div>

            <div id="tableSearchContainer">
                <div id="searchableColumns">
                    <div id="searchableColumnsTrigger">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                    </div>
                    <div id="searchableColumnsList">
                        <span><?=$this->t('Searchable Columns')?></span>
                        <?php if(isset($data['searchableColumns']) && count($data['searchableColumns']) > 0):?>
                            <?php foreach($data['searchableColumns'] as $searchableColumn):?>
                                <span><?=ucfirst($searchableColumn)?></span>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
                <input type="text" id="tableSearchInput" class="input" placeholder="<?=$this->t('Search')?>...">
                <select class="input" id="tableSearchType">
                    <option value="contains"><?=$this->t('Contains')?></option>
                    <option value="startsWith"><?=$this->t('Starts')?></option>
                    <option value="endsWith"><?=$this->t('Ends')?></option>
                </select>
                <div id="userViewOptionsToggle" class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/>
                    </svg>
                </div>
            </div>
            <div id="aboveTable">
                <div id="resultCount">

                </div>
                <div id="extraActions">
                    <button id="exportTable" class="btn hollow glow noMargin small">
                        <?=$this->t('Export')?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/></svg>
                    </button>
                </div>
            </div>

        </div>
        <div id="tableWrapper">
            <table id="crudTable">
                <thead>
                <tr>
                    <th data-index="1" class="selectAllHead"><input class="input" id="selectAllCheckbox" type="checkbox"></th>
                    <?php echo $data['columnHeaders']?>
                    <th class="dataColumn"><?=$this->t('Actions')?></th>
                </tr>

                </thead>
                <tbody id="tableData">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="100" class="selectAllFoot"><input class="input" id="selectAllCheckboxFooter" type="checkbox"></td>
                    </tr>
                </tfoot>
            </table>
            <span id="noResultsMessage"></span>
        </div>
        <div id="tableBottom">
            <div class="tablePaginationContainer" id="tablePaginationContainerBottom">

            </div>
            <div class="goToPageContainer">
                <label><?=$this->t('Page')?></label>
                <input type="number" class="goToPage input">
            </div>
        </div>
        <div id="tableOverlay">
        </div>
    </div>
</div>