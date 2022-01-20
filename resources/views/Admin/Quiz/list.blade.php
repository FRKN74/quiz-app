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
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş tarihi</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                    <th>{{$quiz->title}}</th>
                    <td>{{$quiz->status}}</td>
                    <td>{{$quiz->finished_at}}</td>
                    <td>
                            <a href="#" class="btn btn-outline-warning"> <i class="fa fa-pen"> </i> Güncelle</a>
                            <a href="#" class="btn btn-outline-danger"> <i class="fa fa-trash"> </i> Sil</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>

</x-app-layout>
