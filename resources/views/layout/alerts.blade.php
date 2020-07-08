@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check"></i> 
        {{ session('success') }}
    </div>
@elseif (session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check"></i> 
        {{ session('status') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-times"></i> 
        {{ session('error') }}
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-times"></i> 
        {{ session('warning') }}
    </div>
@endif

@if($errors->any())
<div class="form-group">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li> {{ $error }} </li>
            </ul>
        </div>
    @endforeach
</div>
@endif 