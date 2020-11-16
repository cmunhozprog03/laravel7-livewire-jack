<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        Add Post
    </button>
  
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    @livewire('post-form')
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
      </div>
    </div>
</div>

<div>
    <br>
        
    @if ($posts->count())
        
        <div class="table-resposive">
            <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->content}}</td>
                            </tr>
                            
                        @endforeach
                        {{ $posts-> links()}}
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
