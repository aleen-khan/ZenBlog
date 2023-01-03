@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Manage Category</h5>
                        </div>
                        <hr/>
                       <div class="table-responsive">
                           <table id="example" class="table table-hover table-bordered table-striped">
                               <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Category Name</th>
                                   <th>Author Name</th>
                                   <th>Title</th>
                                   <th>Slug</th>
                                   <th>Description</th>
                                   <th>Image</th>
                                   <th>Date</th>
                                   <th>Blog Type</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                               </thead>
                               @php $i=1 @endphp
                               @foreach($blogss as $blog)
                                   <tbody>
                                   <tr>
                                       <td>{{ $i++ }}</td>
                                       <td>{{ $blog->category_name }}</td>
                                       <td>{{ $blog->author_name }}</td>
                                       <td>{{ substr($blog->title,0,50) }}</td>
                                       <td>{{ substr($blog->slug,0,20) }}</td>
                                       <td>{{ substr($blog->description,0,10) }}</td>
                                       <td>
                                           <img width="100" src="{{ asset($blog->image) }}">
                                       </td>
                                       <td>{{ $blog->date }}</td>
                                       <td>{{ $blog->blog_type }}</td>
                                       <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                       <td>
                                           <a href="" class="btn btn-primary btn-sm">Edit</a>
                                           @if($blog->status == 1)
                                           <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-success btn-sm">Published</a>
                                           @else
                                           <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-warning btn-sm">UnPublished</a>
                                           @endif
                                           <form action="{{ route('blog.delete') }}" method="post" >
                                               @csrf
                                               <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                               <button type="submit" onclick="return confirm('Are You Sure Delete This!!')" class="btn btn-danger btn-sm">Delete</button>
                                           </form>
                                       </td>
                                   </tr>
                                   </tbody>
                               @endforeach
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

