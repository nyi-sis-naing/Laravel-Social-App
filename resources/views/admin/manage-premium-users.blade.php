<x-adminlayout>

<h3 class="mt-3">Manage premium users</h3>
<table class="table align-middle mt-5">
    <thead class="bg-info text-light">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">isAdmin?</th>
        <th scope="col">isPremium?</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($updateUsers as $updateUser)
      <tr>
        <th scope="row">{{$updateUser->id}}</th>
        <td>{{$updateUser->name}}</td>
        <td>{{$updateUser->email}}</td>
        <td>{{$updateUser->isAdmin=='0' ? 'FALSE' : 'TRUE'}}</td>
        <td>{{$updateUser->isPremium=='0' ? 'FALSE' : 'TRUE'}}</td>
        <td><a class="btn btn-sm bg-success text-light" href="{{route('admin.edit_user', $updateUser->id)}}">update</a></td>
        <td><a class="btn btn-sm bg-danger text-light" href="{{route('admin.delete_user', $updateUser->id)}}">delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-adminlayout>