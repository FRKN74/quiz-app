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
                                            <img src="{{ $user->user->profile_photo_url }}" class="w-8 float-right rounded-full"  alt="resm yok" />
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    </div>
                    <div class="col-md-8">
                        {{ $quiz->description }}
                        
                        <hr>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Tipi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz->results as $result )
                                <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $result->user->name }}</td>
                                <td class="bg-primary text-center">{{ $result->point }}</td>
                                <td class="bg-success text-center">{{ $result->correct }}</td>
                                <td class="bg-danger text-center">{{ $result->wrong }}</td>
                                <td>{{ $result->user->email }}</td>
                                <td>{{ $result->user->type == "admin" ? "Admin" : "Kullanıcı"  }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary btn-block">Quizlere git</a>
                    </div>
                </div>
                
            </p>
        </div>
        <div class="card-footer text-muted text-center bg-dark text-white border-primary">
            {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "Bitiş tarihi yok"}} 
        </div>
    </div>
</x-app-layout>
