<div>
    @if($view === 'index')
        <div class="row justify-content-between">
            @if($header_view)
                <div class="col-md-auto mb-3">
                    @include($header_view)
                </div>
            @endif

            @if($hasSearch)
                <div class="col-auto order-last order-md-first">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="{{ __('Search') }}" wire:model="search">
                    </div>
                </div>
            @endif

            @include('livewire-table::table-actions')
        </div>


        <div class="card mb-3">
            @if($models->isEmpty())
                <div class="card-body">
                    {{ __('No results to display.') }}
                </div>
            @else
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table {{ $table_class }} mb-0">
                            <thead class="{{ $thead_class }}">
                            <tr>
                                @if($checkbox && $checkbox_side == 'left')
                                    @include('livewire-table::checkbox-all')
                                @endif

                                @foreach($columns as $column)
                                    <th class="align-middle text-nowrap border-top-0 {{ $this->thClass($column->attribute) }}">
                                        @if($column->orderable)
                                            <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                                            {{ $column->title }}

                                                @if($sort_attribute == $column->attribute)
                                                    <i class="fa fa-sort-amount-{{ $sort_direction == 'asc' ? 'up-alt' : 'down' }}"></i>
                                                @else
                                                    <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                                                @endif
                                        </span>
                                        @else
                                            {{ $column->title }}
                                        @endif
                                    </th>
                                @endforeach

                                @if($checkbox && $checkbox_side == 'right')
                                    @include('livewire-table::checkbox-all')
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                <tr class="{{ $this->trClass($model) }}">
                                    @if($checkbox && $checkbox_side == 'left')
                                        @include('livewire-table::checkbox-row')
                                    @endif

                                    @foreach($columns as $column)
                                        <td class="align-middle {{ $this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute)) }}">
                                            @if($column->view)
                                                @include($column->view)
                                            @else
                                                {{ $value }}
                                            @endif
                                        </td>
                                    @endforeach

                                    @if($checkbox && $checkbox_side == 'right')
                                        @include('livewire-table::checkbox-row')
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <div class="row justify-content-between">
            <div class="col-auto">
                {{ $models->links() }}
            </div>

            @if($footer_view)
                <div class="col-md-auto">
                    @include($footer_view)
                </div>
            @endif
        </div>
    @elseif($view !== 'index')
        @include('livewire-table::form')
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', e => {
            let $this = window.livewire.find(`{{$this->id}}`)

            window.confirmDelete = (id) => {
                if(confirm('Are you sure you want to delete this item ?')){
                    $this.call('destroy', id)
                }

                return false
            }
        })

        window.datepicker = function () {
            return {
                init($el){
                    $($el)
                        .datepicker({format: 'dd/mm/yyyy', todayBtn: 'linked', clearBtn: true, language: 'vi', autoclose: true, todayHighlight: true})
                        .on('changeDate', function(e) {
                            $($el).val(e.format())
                        })
                }
            }
        }
    </script>
@endpush