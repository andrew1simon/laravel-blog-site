<div class="input-group justify-content-end">
    <div class="form-outline">
        <form method="GET" action="/all-posts" >
      <input type="search" id="form1" placeholder="search" value="{{request('search')}}" name="search" class="form-control" />
        
    </div>
    <button type="submit" class="btn btn-warning">
      <i class="fas fa-search"></i>
    </button>
    </form>
  </div>
  