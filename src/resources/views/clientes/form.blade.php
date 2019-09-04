@extends('layouts.app')

@section('title', 'Cadastrar Novo Cliente')
    

@section('content')
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Cliente</span>
            <h3 class="page-title">Cadastrar Novo cliente</h3>
          </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <form class="add-new-post" action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <label for="nome">Nome do Cliente</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="Nome do cliente" id="nome" name="nome" autofocus>
                            </div>
                            <div class="col-4">
                                <label for="CPF">CPF</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="000.000.000-00" id="CPF" name="cpf">
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="meuemail@host.com" id="email" name="email">
                            </div>
                        </div>

                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Contato</h6>
                            </div>
                            <div class="card-body p-0 pb-3 text-center">
                                <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col" class="border-0">Telefone</th>
                                    <th scope="col" class="border-0">Tipo Telefone</th>
                                    <th scope="col" class="border-0">Observação</th>
                                    <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Telefone</td>
                                    <td>select</td>
                                    <td>text</td>
                                    <td>Delete</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-success" style="color:#fff;" id="addLinha">+ Adicionar contato</a>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <div>
                            <button class="btn btn-outline-secondary">
                                <i class="material-icons">cancel</i> Cancelar
                            </button>
                            <button class="btn btn-primary ml-auto" type="submit">
                                <i class="material-icons">file_copy</i> Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- / Add New Post Form -->
          </div>
          {{-- <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Actions</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item p-3">
                    <span class="d-flex mb-2">
                      <i class="material-icons mr-1">flag</i>
                      <strong class="mr-1">Status:</strong> Draft
                      <a class="ml-auto" href="#">Edit</a>
                    </span>
                    <span class="d-flex mb-2">
                      <i class="material-icons mr-1">visibility</i>
                      <strong class="mr-1">Visibility:</strong>
                      <strong class="text-success">Public</strong>
                      <a class="ml-auto" href="#">Edit</a>
                    </span>
                    <span class="d-flex mb-2">
                      <i class="material-icons mr-1">calendar_today</i>
                      <strong class="mr-1">Schedule:</strong> Now
                      <a class="ml-auto" href="#">Edit</a>
                    </span>
                    <span class="d-flex">
                      <i class="material-icons mr-1">score</i>
                      <strong class="mr-1">Readability:</strong>
                      <strong class="text-warning">Ok</strong>
                    </span>
                  </li>
                  <li class="list-group-item d-flex px-3">
                    <button class="btn btn-sm btn-outline-accent">
                      <i class="material-icons">save</i> Save Draft</button>
                    <button class="btn btn-sm btn-accent ml-auto">
                      <i class="material-icons">file_copy</i> Publish</button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Categories</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-3 pb-2">
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category1" checked>
                      <label class="custom-control-label" for="category1">Uncategorized</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category2" checked>
                      <label class="custom-control-label" for="category2">Design</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category3">
                      <label class="custom-control-label" for="category3">Development</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category4">
                      <label class="custom-control-label" for="category4">Writing</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category5">
                      <label class="custom-control-label" for="category5">Books</label>
                    </div>
                  </li>
                  <li class="list-group-item d-flex px-3">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-white px-2" type="button">
                          <i class="material-icons">add</i>
                        </button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->
          </div> --}}
        </div>

@endsection