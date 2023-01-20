@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Предметы</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Список предметов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Добавить предмет</a>
                            @if (count($items))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Наименование</th>
                                                <th>Теги</th>
                                                <th>Дата</th>
                                                <th>Действие</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->tags->pluck('name')->join(', ') }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('items.edit', ['item' => $item->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('items.destroy', ['item' => $item->id]) }}"
                                                        method="item" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Предметов пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $items->links() }}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

