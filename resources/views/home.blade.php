@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12 m12 s12 ">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Добро пожаловать в личный кабинет <b> {{ Auth::user()->name }}</b> !</p>
            <br>
            <p>Чтобы принять участие в Всероссийской профильной смене по информационным технологиям и техническим видам спорта заполните анкету участника и отправьте свой проект ниже !</p>
          </div>
        </div>
      </div>
    </div>
    @if($forms -> isEmpty())
    <div class="col s12 m6 s6 ">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Анкета участника</p>
          </div>
          <div class="card-action">
            <a class="a2" href="/anketa">Отправить анкету</a>
          </div>
        </div>
      </div>
    </div>
    @else
    @foreach ($forms as $form)
    <div class="col s12 m6 s6">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Анкета участника</p>
            <p>Статус: <span class="span__status">Проверена</span></p>
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
    </div>
    @endforeach
    @endif

    @if($formtwos -> isEmpty())
    <div class="col s12 m6 s6">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Проект участника</p>
          </div>
          <div class="card-action">
            <a class="a2" href="/uchat">Отправить проект</a>
          </div>
        </div>
      </div>
    </div>
    @else
    @foreach ($formtwos as $formtwo)
    <div class="col s12 m6 s6">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Проект участника</p>
          <p>Статус: <span  class="span__status">Принят</span></p>
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
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection