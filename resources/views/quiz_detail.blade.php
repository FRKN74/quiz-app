<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card ">
        <div class="card-header text-center bg-dark text-white border-primary">
            {{ $quiz->title }}
        </div>
        <div class="card-body bg-dark text-white ">
            <p class="card-text bg-dark text-white ">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group ">
                            @if ($quiz->my_result)
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                    Doğru Sayısı:
                                    <span class="badge badge-success">{{ $quiz->my_result->correct }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                    Yanlış Sayısı:
                                    <span class="badge badge-danger">{{ $quiz->my_result->wrong }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                    Puan:
                                    @if ($quiz->my_result->point < 50)
                                        <span class="badge badge-danger">{{ $quiz->my_result->point }}</span>
                                    @elseif ($quiz->my_result->point > 50)
                                        <span class="badge badge-success">{{ $quiz->my_result->point }}</span>
                                    @endif
                                </li>
                                
                            <hr>
                            @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Soru Sayısı
                                <span class="badge badge-primary">{{ $quiz->questions_count }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Son katılım tarihi
                                <span class="badge badge-primary" title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "-"}}</span>
                            </li>
                            @if ($quiz->details)
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                    Katılımcı
                                <span class="badge badge-primary" >{{ $quiz->details['join_count'] }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                    Ortalama Puan
                                    <span class="badge badge-primary" >{{ $quiz->details['average'] }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-8">
                        {{ $quiz->description }}
                        @if ($quiz->my_result)
                        <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-warning d-block mt-5">Sınavı görüntüle</a>
                        @else
            
                        <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary d-block mt-5">Quize katıl</a>
                        @endif
                        <hr>

                        @if (count($quiz->topTen)>0)
                            <div class="card bg-dark text-white border-primary">
                                <div class="card-title text-center m-2"> 
                                    <h5>İlk 10</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($quiz->topTen as $user )
                                        <li class="list-group-item  bg-dark text-white border-primary ">
                                            @if ($loop->iteration == 1)
                                                <strong class="badge badge-success " style="font-size: 1.5rem">{{ $loop->iteration  }}.</strong>
                                            @else
                                            <strong class="badge badge-warning size:2rem">{{ $loop->iteration  }}.</strong>

                                            @endif
                                            
                                            <span class="ml-2">
                                                {{ $user->user->name }} <span class="badge badge-success ml-3"> {{ $user->point }}</span>
                                                <img src="{{ $user->user->profile_photo_url }}" class="w-10 float-right rounded-full"  alt="resm yok" />
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
            </p>
        </div>
        <div class="card-footer text-muted text-center bg-dark text-white border-primary">
            {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "Bitiş tarihi yok"}} 
        </div>
    </div>
</x-app-layout>
