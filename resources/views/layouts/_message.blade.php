@if (session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
        {{ "This is From Layouts Folder" }}
    </div>
@endif