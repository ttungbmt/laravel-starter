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
    </script>
@endpush