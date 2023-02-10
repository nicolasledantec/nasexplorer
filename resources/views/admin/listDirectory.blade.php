
<div class="row">
  <div class="col-lg-12">
    <div class="card-group">
      @foreach($list_directories as $_directory)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $_directory->path }}</h6>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
