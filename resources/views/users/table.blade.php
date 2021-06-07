<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>

            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        @if(! $user->hasRole('admin'))
            <tr>
                <td>{!! $user->first_name !!}</td>
                <td>{!! $user->last_name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->getRoleNames() !!}</td>
                
                <td>  


                   <form method="POST" action="{{route('users.unban',['user'=>$user])}}" >
                    @csrf
                    @if( $user->account_status=='Banned')
                   <input type="submit" class="btn btn-success" value="Unban">
                   @endif
                   </form>
             
                   <form method="POST" action="{{route('users.ban',['user'=>$user])}}" >
                   @csrf
                   @if( $user->account_status=='Active')
                   <input type="submit" class="btn btn-danger btn-md" value="Ban      ">
                   @endif
                   </form>


                   


   
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
