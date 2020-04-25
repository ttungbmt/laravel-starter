<div class="col-md-auto mb-3">
    <div>
        <div class="dt-buttons btn-group flex-wrap">
            <button type="button" class="btn btn-secondary buttons-create" wire:click="handleCreate">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </button>
        </div>
    </div>

    {{-- <div class="col-md-auto mb-3">
          <div class="dt-buttons btn-group flex-wrap">
              <button class="btn btn-secondary buttons-create" type="button" wire:click="download">
                  <span><i class="fa fa-plus"></i> Create</span></button>
              <div class="btn-group">
                  <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-export" type="button" title="Export">
                      <span><i class="fa fa-download"></i> &nbsp;<span class="caret"></span></span>
                  </button>
              </div>
              <button class="btn btn-secondary buttons-print" type="button" title="Print">
                  <span><i class="fa fa-print"></i> </span></button>
              <button class="btn btn-secondary buttons-reset" type="button" title="Reset">
                  <span><i class="fa fa-undo"></i></span></button>
              <button class="btn btn-secondary buttons-reload" type="button" title="Reload">
                  <span><i class="fa fa-refresh"></i> </span>
              </button>
          </div>
      </div>--}}
</div>