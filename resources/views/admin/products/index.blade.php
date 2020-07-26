@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Tạo sản phẩm</a>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Code</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Hình ảnh</th>
                                    <th>Người đăng</th>
                                    <th>Ngày cập nhật</th>
                                    <th style="min-width: 150px">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if (!empty($product->image) && file_exists(public_path(get_thumbnail("uploads/$product->image"))))
                                                <img src="{{ asset(get_thumbnail("uploads/$product->image")) }}" alt="Image" class="img-responsive img-thumbnail">
                                            @else
                                                <img src="{{ asset('images/no_image_thumb.jpg') }}" alt="No Image" class="img-responsive img-thumbnail">
                                            @endif
                                        </td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.setFeaturedProduct', ['id' => $product->id]) }}"
                                               class="btn btn-{{ $product->featured_product ? 'success' : 'default' }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('product-featured-{{ $product->id }}').submit();"><i class="glyphicon glyphicon-eye-{{ $product->featured_product ? 'open' : 'close' }}"></i></a>
                                            <a href="{{ route('admin.product.show', ['id' => $product->id]) }}"
                                               class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                        window.confirm('Bạn đã chắc chắn xóa chưa?') ?
                                                       document.getElementById('product-delete-{{ $product->id }}').submit() :
                                                       0;"><i class="glyphicon glyphicon-remove"></i></a>
                                            <form action="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                                  method="post" id="product-delete-{{ $product->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>

                                            <form action="{{ route('admin.product.setFeaturedProduct', ['id' => $product->id]) }}"
                                                  method="post" id="product-featured-{{ $product->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('patch') }}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">Không có dữ liệu nào</td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection