## Cách login bằng google và github
## Bước 1: Trước tiên, chúng ta cần cài đặt 1 package đã được laravel hỗ trợ để chúng ta có thể connect tới google và github.
composer require laravel/socialite
## Bước 2: Tạo google app and github app
   Trước hết, chúng ta cần phải có ID CLIENT và CLIENT SECRET:
 - Google app: Truy cập https://console.developers.google.com/ và tạo một ứng dụng mới
 
    ![image](https://github.com/longjos123/document_login/assets/74553819/520687aa-eab8-48f4-b5fa-9ea50c381896)
    
    Nhập tên và id cho ứng dụng.
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/eb8e55f1-80ae-4bd2-9a87-66df266e1320)
    
    Kích hoạt dịch vụ Google+ API bằng cách:
    * Nhập google+ API vào ô search
    * Chọn mục Google+ API
    * Ấn nút enable và chờ API được kích hoạt
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/57d4dc50-8e7a-4bcd-b220-0d0ee6a7405a)
    ![image](https://github.com/longjos123/document_login/assets/74553819/5a1d4f9b-e1d5-4d35-80d3-dfdc3dcd6c4a)
    
    Tạo chứng nhận cho API như sau:
    * Chọn mục “Credentials” ở bên trái và chọn tab “OAuth consent screen”
    * Chọn Email Address, nhập Product Name, và lưu lại.
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/b42dabcd-38d5-4ab4-9833-17e7cfe7eb88)
    
    Chuyển sang tab Credentials.
    * Click button “Create credentials và chọn “OAuth client ID”
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/cf86a7ac-eb67-4983-90d8-ec6e3ca9910f)
    
    Phần application type chọn “Web application” (Ở đây mình sử dụng để đăng nhập cho ứng dụng web)

    Phần “Authorized JavaScript origins” nhập tên miền của ứng dụng web

    Phần “Authorized redirect URI” nhập đường dẫn của server xử lý code gửi về từ google.
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/26fb5a71-2818-4609-8b6f-94a4b7efdc6f)
    
    Sau khi tạo nó sẽ hiện ra client ID và client secret
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/2381951b-4d47-482b-a342-5e731266811e)
    
    Bạn cũng có thể xem lại chi tiết về client id và client secret bằng cách chọn vào tên của credential vừa tạo ở tab “Credentials”
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/f0c7cd3a-708b-4038-97bc-39be5dbd942b)
    ![image](https://github.com/longjos123/document_login/assets/74553819/eed354d0-0149-44a0-9c71-844b9f8e729a)
    
    
- Github app: Truy cập https://github.com/settings/developers và tạo một ứng dụng mới:

    ![image](https://github.com/longjos123/document_login/assets/74553819/731fdc9d-1701-4655-ae3a-b41515f1c2ef)

    Tại đây, thêm tên ứng dụng và chuyển hướng lại url:
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/59db11ee-5d1d-401c-a0f7-95b7be940e76)

    Sau đó, github trả lại cho chúng ta client id và client secret như sau:
    
    ![image](https://github.com/longjos123/document_login/assets/74553819/950e1053-3d07-43b5-9f4c-a250689b7311)

Sau khi tạo thành công một ứng dụng trong Google, Github và nhận thông tin đăng nhập từ bảng điều khiển của Google, Github, các ban vào file config / service.php và thêm đoạn cấu hình bên dưới:

    - Google:
    
        'google' => [
            'client_id' => 'xxxx',
            'client_secret' => 'xxx',
            'redirect' => 'http://127.0.0.1:8000/callback/google',
          ], 
          
     - Github:
     
        'github' => [
            'client_id' => 'xxxx',
            'client_secret' => 'xxx',
            'redirect' => 'http://127.0.0.1:8000/callback/github',
          ],
          
 Tiếp tục làm theo các bước ở bài viết này nhé: https://viblo.asia/p/login-vao-ung-dung-bang-tai-khoan-google-924lJqO0ZPM


