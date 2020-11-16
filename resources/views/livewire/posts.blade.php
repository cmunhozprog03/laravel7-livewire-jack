<div>
    @livewire('post-form')
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
                    </tbody>
                </table>
            </div>
            <div>
                {{ $posts-> links()}}
            </div>
            
        @endif
    </div>
    
</div>
