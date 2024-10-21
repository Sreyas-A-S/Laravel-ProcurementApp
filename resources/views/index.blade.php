
@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div class="overflow-hidden">
		<div class="container">
			<div class="max-w-2xl mx-auto text-center pt-3 pb-2">
				<h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
					Find the right plan for your business
				</h2>
				
			</div>
		</div>

		

		<div class="container my-3">
			<div class="row align-items-center align-items-xl-stretch flex-column flex-xl-row">
				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5">
					< class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<h2>Suppliers</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder essential">49</span>
							<span class="fs-3 text-body-secondary">/mo</span>
						</div>
						
						<hr class="opacity-10">
						
						
                        <a href="suppliers">
                        <div class="mt-auto">
							<button class="btn btn-primary text-white mt-4 w-100">
								View
							</button>
						</div>
                        </a>
                        

					</div>
				</div>

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<h2>Items</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder essential">49</span>
							<span class="fs-3 text-body-secondary">/mo</span>
						</div>
						
						<hr class="opacity-10">
						
						<a href="items">
                        <div class="mt-auto">
							<button class="btn btn-primary text-white mt-4 w-100">
								View
							</button>
						</div>
                        </a>
					</div>
				</div>

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<h2>Purchase Orders</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder essential">49</span>
							<span class="fs-3 text-body-secondary">/mo</span>
						</div>
						
						<hr class="opacity-10">
						
						<a href="orders">
                        <div class="mt-auto">
							<button class="btn btn-primary text-white mt-4 w-100">
								View
							</button>
						</div>
                        </a>
					</div>
				</div>

				
			</div>
		</div>
	</div>
   
    @endsection