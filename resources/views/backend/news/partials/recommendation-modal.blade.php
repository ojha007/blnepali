<div class="modal fade" id="recommendationModal" tabindex="-1" role="dialog"
     aria-labelledby="recommendationModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive" id="recommendationTable">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Select</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#recommendationModal').on('show.bs.modal', function () {
                $('#recommendationTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                        Method: 'GET',
                        url: '{{route($routePrefix.'news.index')}}',
                        dataType: "JSON",
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                    ],

                });
            })
        })
    </script>
@endpush
