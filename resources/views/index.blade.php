<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css" />
</head>
<style>
  body{
    background:rgb(46, 13, 123);
    width:1300px;
    margin: 0 auto;
  }
  .todo{
    background:white;
    width:53%;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 200px;
    padding-top: 20px;
    padding-bottom: 60px;
    padding-left: 30px;

  }
  .ttl{
    font-size: 25px;
    font-weight: bolder;

  }
  .text1{
    width: 76%;
    padding: 7px;
    margin-bottom: 20px;
    margin-top: 7px;
  }
  .text1-1{
    padding: 5px 10px;
    margin-left: 50px;
  }
  .koumoku{
    margin-top: 100px;
    margin-left: 300px;
  }
  th{padding-left: 99px;}

</style>
<body>
  <div class="todo">
    <div class="ttl">Todo List</div>
    <form action="/todo/create" method="POST">
    @csrf
      <input type="text" name="content" class="text1">
      <input type="submit" value="追加" class="text1-1">
    </form>
    <table>
      <tr class="koumoku">
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
        @foreach ($items as $txt)
      <tr>
        <td>{{ $txt->created_at }}</td>
        <form action="/todo/update" method="POST">
          @csrf
          <td><input type="text" value="{{ $txt->content }}" ></td>
          <td>
            <button type="submit" name="update" value="{{$txt}}">更新</button>
          </td>
        </form>
        <td>
          <form action="/todo/delete" method="POST">
            @csrf
            <button type="submit" name="delete" value="{{$txt->id}}">削除</button>
          </form>
        </td>
        @endforeach
      </tr>
    </table>
  </div>
</body>
</html>
