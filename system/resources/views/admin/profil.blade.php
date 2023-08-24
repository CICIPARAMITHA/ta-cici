@extends('admin.template.base')
@section('content')
<main class="mdl-layout__content ui-form-components">

	<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

		<div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
			<div class="mdl-card mdl-shadow--2dp">
				<div class="mdl-card__title">
					<h5 class="mdl-card__title-text text-color--white">Profil Akun</h5>
				</div>
				<div class="mdl-card__supporting-text">
					<div class="form form--basic">
						<div class="mdl-grid">
							<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone form__article">
								<form action="{{url('admin/profil/update')}}" method="post">
									@csrf
									<h3 class="text-color--smooth-gray">Update Akun</h3>
										@foreach(['success', 'warning', 'danger'] as $status)
									@if (session($status))
									<div class="alert alert-{{$status}} mt-3 alert-dismissable custom-{{$status}}-box">
										<a href="#" class="close" data-dismiss='alert' aria-label='close'></a>
										<strong> {{session($status)}} </strong>
									</div>
									@endif
									@endforeach
									<div class="mdl-textfield mdl-js-textfield full-size">
										<input class="mdl-textfield__input" type="text" required value="{{$user->username}}" name="username" id="first-name">
										<label class="mdl-textfield__label" for="first-name">Username</label>
									</div>

									<div class="mdl-textfield mdl-js-textfield full-size">
										<input class="mdl-textfield__input" type="text" required value="{{$user->ip}}" name="ip" id="first-name">
										<label class="mdl-textfield__label" for="first-name">Ip</label>
									</div>

									<div class="mdl-textfield mdl-js-textfield full-size">
										<input class="mdl-textfield__input" name="new_password" type="password" raquired id="last-name">
										<label class="mdl-textfield__label" for="last-name">Password Baru</label>
									</div>
									<div class="mdl-textfield mdl-js-textfield full-size">
										<input class="mdl-textfield__input" name="konfirmasi" type="password" raquired id="e-mail">
										<label class="mdl-textfield__label" for="e-mail">Konfirmasi Password Baru</label>
									</div>

									<button class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
										UPDATE
									</button>
								</form>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>

		

	</main>	

	@endsection