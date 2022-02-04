<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonuclar</x-slot>

    <div class="card ">
        <div class="card-header text-center bg-dark text-white border-primary">
            {{ $quiz->title }}
        </div>
        <div class="card-body bg-dark text-white ">
            <p class="card-text bg-dark text-white ">

                <form action="{{ route('quiz.result',$quiz->slug) }}" method="POST">
                    @csrf
                @foreach ($quiz->questions as $question)

                <strong> 
                @if ($question->correct_answer == $question->my_answer->answer)
                    <i  class="fa fa-check-circle text-success"></i>
                @else
                    <i  class="fa fa-times text-danger"></i>
                @endif    
                <small class="badge badge-info">{{ $loop->iteration }}. </small> {{ $question->question }}</strong>
                @if ($question->image)
                    <img src="{{ asset($question->image) }}"  alt="resim yok" class="img-responsive mt-5 ml-5 w-50">
                @endif
                <br>
                <div class="form-check">

                    @if ('answer1' == $question->correct_answer)
                    <i class="fa fa-check-square text-success"></i>
                    @elseif ('answer1' == $question->my_answer->answer)
                    <i class="fa fa-dot-circle"></i>
                    @endif
                    <label class="custom" for="quiz-{{ $question->id }}-1">{{ $question->answer1 }}</label>
                    
                </div>
                <br>
                <div class="form-check">

                    @if ('answer2' == $question->correct_answer)
                    <i class="fa fa-check-square text-success"></i>
                    @elseif ('answer2' == $question->my_answer->answer)
                    <i class="fa fa-dot-circle"></i>
                    @endif
                    <label class="custom" for="quiz-{{ $question->id }}-2">{{ $question->answer2 }}</label>
                    
                </div>
                <br>
                <div class="form-check">

                    @if ('answer3' == $question->correct_answer)
                    <i class="fa fa-check-square text-success"></i>
                    @elseif ('answer3' == $question->my_answer->answer)
                    <i class="fa fa-dot-circle"></i>
                    @endif
                    <label class="custom" for="quiz-{{ $question->id }}-3">{{ $question->answer3 }}</label>
                    
                </div>
                <br>
                <div class="form-check">

                    @if ('answer4' == $question->correct_answer)
                    <i class="fa fa-check-square text-success"></i>
                    @elseif ('answer4' == $question->my_answer->answer)
                    <i class="fa fa-dot-circle"></i>
                    @endif
                    <label class="custom" for="quiz-{{ $question->id }}-4">{{ $question->answer4 }}</label>
                    
                </div>
                @if(!$loop->last)
                    <hr>
                @endif
                @endforeach
            </form>
            </p>
        </div>
    </div>
</x-app-layout>
