<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card border-primary">
        <div class="card-body bg-dark text-white border-primary">
            <h5 class="card-title float-right">Quizler
                <a href="{{route('quizzes.create')}}" class="btn btn-warning"> <i class="fa fa-plus"></i> Quiz oluştur</a> 
            </h5>
                <form method="GET" action="#">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="text" name="title" value="{{ request()->get('title') }}" placeholder="Quiz adı" id="" class="form-control bg-dark border-primary text-white">
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="status" id=""  class="form-control bg-dark border-primary text-white" onchange="this.form.submit()">
                                <option value="">Durum şeçiniz...</option>
                                <option @if(request()->get('status')=== "publish") selected @endif value="publish">Aktif</option>
                                <option @if(request()->get('status')=== "passive") selected @endif value="passive">Pasif</option>
                                <option @if(request()->get('status')=== "draft") selected @endif value="draft">Taslak</option>
                            </select>
                        </div>
                        @if(request()->get('title') || request()->get('status'))
                            <div class="col-md-2 mb-2">
                                <a href="{{ route('quizzes.index') }}" class="btn btn-outline-secondary">Sıfırla</a>
                            </div>
                        @endif
                    </div>
                </form>
            <table class="table table-striped table-dark border-primary">
                <thead class=" border-primary">
                    <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru sayısı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş tarihi</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                    <th>{{$quiz->title}}</th>
                    <th class="text-center">{{$quiz->questions_count}}</th>
                    <td>
                        @switch($quiz->status)
                            @case('publish')
                            <span class="badge badge-success">Aktif</span>
                                @break
                            @case('passive')
                            <span class="badge badge-danger">Pasif</span>
                                @break
                            @case('draft')
                            <span class="badge badge-secondary">Taslak</span>
                                @break
                            @default
                                
                        @endswitch
                    </td>
                    <td class="text-center" title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "-"}}</td>
                    <td>
                            <a title ="Sorular" href="{{ route('questions.index',$quiz->id) }}" class="btn btn-outline-info"> <i class="fa fa-question"> </i> </a>
                            <a title ="Güncelle" href="{{ route('quizzes.edit',$quiz->id) }}" class="btn btn-outline-warning"> <i class="fa fa-pen"> </i> </a>
                            <a title ="Sil" href="{{ route('quizzes.destroy',$quiz->id) }}" class="btn btn-outline-danger"> <i class="fa fa-trash"> </i> </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->withQueryString()->links()}} <!-- withQuertString = oluşturduğumuz query sistemini linkede ekle diyoruz. -->
        </div>
    </div>

</x-app-layout>
