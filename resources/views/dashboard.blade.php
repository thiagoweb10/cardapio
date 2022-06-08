<x-app-layout>
    <x-slot name="header">
       
       {{ __('Dashboard') }}
        
    </x-slot>
  
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<h3>{{ $orders }}</h3>
							<p>Novo Pedidos</p>
						</div>
						<div class="icon">
							<i class="fas fa-shopping-basket"></i>
							
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>

				<div class="col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>{{ $customers }}</h3>
							<p>Cliente</p>
						</div>
						<div class="icon">
							<i class="fa fa-solid fa-users"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
      
</x-app-layout>
