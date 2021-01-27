@extends('layouts.master')

@section('content')

<section class="">

   <div class="container">
      <div class="row">
         <div class="col l12 m12 s12">
            @foreach ( $users as $user )
            <div class="card blue-grey darken-1">
               <div class="card-content white-text">
                  <p>Почта пользователя --- {{$user -> email}}</p>
                  <div class="info__card">
                     @foreach( $forms as $form)
                     @if(($form -> user_id) === ($user -> id))
                     <div class="card horizontal">
                        <div class="card-stacked">
                           <div class="card-content">
                              <p>Анкета участника</p>
                           </div>
                           <div class="card-action">
                              <p>ФИО - {{ $form -> name }}</p>
                              <p>Дата рождения - {{ $form -> date }}</p>
                              <p>Место рождения - {{ $form ->  birthplace }}</p>
                              <p>Адрес места жительства - {{ $form -> address}}</p>
                              <p>Место учебы - {{ $form -> place }}</p>
                              <p>Наличие опыта участия в Конкурсах - {{ $form -> exp }}</p>
                              <p>Наличие / отсутствие наград - {{ $form -> wins }}</p>
                              <p>Наличие рекомендательного - {{ $form -> letter }}</p>
                              <p>Телефон - {{ $form -> tel }}</p>
                              <p>Почта - {{ $form -> email }}</p>
                              <p>Приложение -
                                 @if ($form['app'] === null)
                                 нет файла
                                 @endif
                                 @if ($form['app'] !== null)
                                 <a href="/storage/{{ $form -> app}}" class="oi">{{ $form -> app}}</a>
                                 @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     @endforeach
                     @foreach( $formtwos as $formtwo)
                     @if(($formtwo -> user_id) === ($user -> id))
                     <div class="card horizontal">
                        <div class="card-stacked">
                           <div class="card-content">
                              <p>Проект участника</p>
                           </div>
                           <div class="card-action">
                              <p>Почта - {{ $formtwo -> email }}</p>
                              <p>ФИО - {{ $formtwo -> fio }}</p>
                              <p>название проекта - {{ $formtwo -> nameproject }}</p>
                              <p>цели и задачи проекта - {{ $formtwo -> celi }}</p>
                              <p>актуальность проекта - {{ $formtwo -> aktual }}</p>
                              <p>описание прокета - {{ $formtwo -> opis }}</p>
                              <p>план реализации прокета - {{ $formtwo -> plan }}</p>
                              <p>команда прокета - {{ $formtwo -> team }}</p>
                              <p>приложение -
                                 @if ($formtwo['priloj'] === null)
                                 нет файла
                                 @endif
                                 @if ($formtwo['priloj'] !== null)
                                 <a href="/storage/{{ $formtwo -> priloj}}" class="oi">{{ $formtwo -> priloj}}</a>
                                 @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
@endsection