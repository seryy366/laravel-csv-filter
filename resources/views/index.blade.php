@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <form role="form" method="get" action="{{ route('search') }}" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                <label>Включать выбранные теги</label>
                                <select name="includeTags[]" id="tags-on" class="select2" multiple="multiple"
                                        data-placeholder="Выбор тегов" style="width: 100%;">
                                    @foreach($tags as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
{{--                                        <option value="{{ $k }}" @if(in_array($k, $item->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>--}}
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Не включать выбранные теги</label>
                                <select name="omitTag[]" id="tags-off" class="select2" multiple="multiple"
                                        data-placeholder="Выбор тегов" style="width: 100%;">
                                    @foreach($tags as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info">Применить</button>
                        <a href="export-csv" target="_blank" class="btn btn-primary me-1">Export</a>
                    </div>
                </form>

            </div>
            <div class="card-body">
                @if (count($items))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Теги</th>
                                <th>Простмотры в поиске</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->tags->pluck('name')->join(', ') }}</td>
                                    <td>{{ $item->show_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Товаров пока нет...</p>
                @endif
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
