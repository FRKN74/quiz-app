<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card border-dark">
        <div class="card-body border-dark">
            <h5 class="card-title">{{ $quiz->title }} Ait Sorular</h5>
            <a href="{{route('quizzes.index',$quiz->id)}}" class="btn btn-primary float-left"> <i class="fa fa-arrow-left"></i> Geri dön</a> 
            <a href="{{route('questions.create',$quiz->id)}}"  class="btn btn-warning">  <i class="fa fa-plus"></i> Soru oluştur</a> 
                <br>
                <br>
                
            <table class="table table-striped table-dark table-sm">
                <thead>
                    <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">Resim</th>
                    <th scope="col">1. Cevap</th>
                    <th scope="col">2. Cevap</th>
                    <th scope="col">3. Cevap</th>
                    <th scope="col">4. Cevap</th>
                    <th scope="col">Doğrı Cevap</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $quiz->questions as  $question  )

                    <tr>
                    <th>{{ $question->question }}</th>
                    <td>
                        <img src="{{ asset($question->image) }}"  width="150px" height="150px" alt="Resim yok">
                    </td>
                    <td>{{ $question->answer1  }}</td>
                    <td>{{ $question->answer2  }}</td>
                    <td>{{ $question->answer3  }}</td>
                    <td>{{ $question->answer4  }}</td>
                    <td style="color: green">{{ substr($question->correct_answer,-1 )}}.Cevap</td>
                    <td>
                            <a title ="Güncelle" href="{{ route('questions.edit',[$quiz->id,$question->id]) }}" class="btn btn-sm btn-outline-warning"> <i class="fa fa-pen"> </i> </a>
                            <a title ="Sil" href="{{ route('questions.destroy',[$quiz->id,$question->id]) }}" class="btn btn-sm btn-outline-danger"> <i class="fa fa-trash"> </i> </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
