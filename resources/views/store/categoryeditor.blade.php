@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        @if (session('success'))
            <b>{{ Session::get('success') }}</b>
        @else
            <p></p>
        @endif
        <button id="scroll-to-bottom-button" type="button" class="btn btn-primary">Create new category</button>
    </div>

    <script>
        document.getElementById("scroll-to-bottom-button").addEventListener("click", function () {
            document.body.scrollIntoView({behavior: "smooth", block: "end"});
        });
    </script>
    @foreach ($categories as $category)
        <div class="body mt-2">
            <div class="d-flex justify-content-center">
                <div class="managelist">
                    <div class="d-flex" style="background-color: white; width: 70vw;">
                        <div class="managetitle ms-4 mt-4">

                            <h5 class="card-text"><b>{{ $category->name }}</b></h5>
                            <div class="editcategory">
                                <form method="POST" action="/updateCategory/{{ $category->id }}"
                                      class="d-flex justify-content-between pb-4">
                                    @csrf
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>

                        </div>
                        <div class="d-flex mt-4 me-3 justify-content-end" style="width: 100%">
                            <form action="/deleteCategory/{{ $category->id }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="managebtn btn btn-outline-danger">&#128465</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <form method="post" action="/createCategory" class="d-flex justify-content-between pb-4 pt-4">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="Type new category.." required>
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
