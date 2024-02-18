<x-adminlayout>
<h3 class="mt-3">Contact messages</h3>
<table class="table align-middle mt-5">
    <thead class="bg-dark text-light">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Messages</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($messages as $message)
      <tr>
        <th scope="row">{{$message->id}}</th>
        <td>{{$message->name}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->message}}</td>
        <td><a href="{{route('editMessage', $message->id)}}"><button class="btn btn-sm bg-success text-light">update</button></a></td>
        <td><a href="{{route('deleteMessage', $message->id)}}"><button class="btn btn-sm bg-danger text-light">delete</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-adminlayout>