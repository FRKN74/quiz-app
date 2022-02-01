<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card border-dark">
        <div class="card-body border-dark">
            <h5 class="card-title">Quizler</h5>
                <a href="{{route('quizzes.create')}}" class="btn btn-warning"> <i class="fa fa-plus"></i> Quiz oluştur</a> 
                <br>
                <br>
            <table class="table table-striped table-dark">
                <thead>
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
            {{$quizzes->links()}}
        </div>
    </div>

</x-app-layout>
