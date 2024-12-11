Berikut adalah contoh request untuk menguji setiap endpoint API yang telah Anda buat menggunakan Postman. Pastikan untuk mengganti `your-api-url` dengan URL API Anda yang sesuai, dan `your_generated_token` dengan token yang dihasilkan setelah login.

### **1. Register (POST /api/register)**
Mendaftar pengguna baru.

**Method**: POST  
**URL**: `http://your-api-url/api/register`

**Body** (JSON):
```json
{
  "username": "john_doe",
  "email": "john@example.com",
  "password": "password123",
  "bio": "This is my bio",
  "profile_picture": "url_to_profile_picture"
}
```

**Response**:
```json
{
  "id": 1,
  "username": "john_doe",
  "email": "john@example.com",
  "bio": "This is my bio",
  "profile_picture": "url_to_profile_picture"
}
```

---

### **2. Login (POST /api/login)**
Login untuk mendapatkan token.

**Method**: POST  
**URL**: `http://your-api-url/api/login`

**Body** (JSON):
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

**Response**:
```json
{
  "token": "your_generated_token",
  "user": {
    "id": 1,
    "username": "john_doe",
    "email": "john@example.com",
    "bio": "This is my bio",
    "profile_picture": "url_to_profile_picture"
  }
}
```

---

### **3. Logout (POST /api/logout)**
Logout untuk menghapus token.

**Method**: POST  
**URL**: `http://your-api-url/api/logout`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Logged out successfully."
}
```

---

### **4. Get Current User (GET /api/me)**
Ambil data pengguna yang sedang login.

**Method**: GET  
**URL**: `http://your-api-url/api/me`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "id": 1,
  "username": "john_doe",
  "email": "john@example.com",
  "bio": "This is my bio",
  "profile_picture": "url_to_profile_picture"
}
```

---

### **5. Create Post (POST /api/posts)**
Membuat post baru.

**Method**: POST  
**URL**: `http://your-api-url/api/posts`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Body** (JSON):
```json
{
  "content": "This is my first post!",
  "image": "url_to_image"
}
```

**Response**:
```json
{
  "id": 1,
  "user_id": 1,
  "content": "This is my first post!",
  "image": "url_to_image",
  "created_at": "2024-12-11T00:00:00.000000Z",
  "updated_at": "2024-12-11T00:00:00.000000Z"
}
```

---

### **6. Get All Posts (GET /api/posts)**
Ambil semua post.

**Method**: GET  
**URL**: `http://your-api-url/api/posts`

**Response**:
```json
[
  {
    "id": 1,
    "user_id": 1,
    "content": "This is my first post!",
    "image": "url_to_image",
    "created_at": "2024-12-11T00:00:00.000000Z",
    "updated_at": "2024-12-11T00:00:00.000000Z"
  }
]
```

---

### **7. Get Post (GET /api/posts/{id})**
Ambil post dengan ID tertentu.

**Method**: GET  
**URL**: `http://your-api-url/api/posts/1`

**Response**:
```json
{
  "id": 1,
  "user_id": 1,
  "content": "This is my first post!",
  "image": "url_to_image",
  "created_at": "2024-12-11T00:00:00.000000Z",
  "updated_at": "2024-12-11T00:00:00.000000Z"
}
```

---

### **8. Delete Post (DELETE /api/posts/{id})**
Menghapus post dengan ID tertentu.

**Method**: DELETE  
**URL**: `http://your-api-url/api/posts/1`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Post deleted successfully."
}
```

---

### **9. Add Comment (POST /api/posts/{id}/comments)**
Menambahkan komentar pada post dengan ID tertentu.

**Method**: POST  
**URL**: `http://your-api-url/api/posts/1/comments`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Body** (JSON):
```json
{
  "comment": "Great post!"
}
```

**Response**:
```json
{
  "id": 1,
  "user_id": 1,
  "post_id": 1,
  "comment": "Great post!",
  "created_at": "2024-12-11T00:00:00.000000Z",
  "updated_at": "2024-12-11T00:00:00.000000Z"
}
```

---

### **10. Get Comments (GET /api/posts/{id}/comments)**
Ambil semua komentar dari post dengan ID tertentu.

**Method**: GET  
**URL**: `http://your-api-url/api/posts/1/comments`

**Response**:
```json
[
  {
    "id": 1,
    "user_id": 1,
    "post_id": 1,
    "comment": "Great post!",
    "created_at": "2024-12-11T00:00:00.000000Z",
    "updated_at": "2024-12-11T00:00:00.000000Z"
  }
]
```

---

### **11. Like Post (POST /api/posts/{id}/like)**
Memberikan like pada post dengan ID tertentu.

**Method**: POST  
**URL**: `http://your-api-url/api/posts/1/like`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Post liked successfully."
}
```

---

### **12. Unlike Post (DELETE /api/posts/{id}/unlike)**
Menghapus like pada post dengan ID tertentu.

**Method**: DELETE  
**URL**: `http://your-api-url/api/posts/1/unlike`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Post unliked successfully."
}
```

---

### **13. Search User (GET /api/users/search)**
Mencari pengguna berdasarkan username.

**Method**: GET  
**URL**: `http://your-api-url/api/users/search?username=john`

**Response**:
```json
[
  {
    "id": 1,
    "username": "john_doe",
    "email": "john@example.com",
    "bio": "This is my bio",
    "profile_picture": "url_to_profile_picture"
  }
]
```

---

### **14. Get User Profile (GET /api/users/{id})**
Ambil profil pengguna dengan ID tertentu.

**Method**: GET  
**URL**: `http://your-api-url/api/users/1`

**Response**:
```json
{
  "id": 1,
  "username": "john_doe",
  "email": "john@example.com",
  "bio": "This is my bio",
  "profile_picture": "url_to_profile_picture"
}
```

---

### **15. Follow User (POST /api/users/{id}/follow)**
Mengikuti pengguna dengan ID tertentu.

**Method**: POST  
**URL**: `http://your-api-url/api/users/2/follow`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Followed successfully."
}
```

---

### **16. Get Followers (GET /api/users/{id}/followers)**
Mendapatkan daftar followers pengguna dengan ID tertentu.

**Method**: GET  
**URL**: `http://your-api-url/api/users/1/followers`

**Response**:
```json
[
  {
    "follower_id": 2,
    "following_id": 1
  }
]
```

---

### **17. Get Following (GET /api/users/{id}/following)**
Mendapatkan daftar following pengguna dengan ID tertentu.

**Method**: GET  
**URL**: `http://your-api-url/api/users/1/following`

**Response**:
```json
[
  {
    "follower_id": 1,
    "following_id": 2
  }
]
```

---

### **18. Get User Posts (GET /api/users/{id}/posts)**
Mendapatkan daftar post dari pengguna dengan ID tertentu.

**Method**: GET  
**URL**: `http://your

-api-url/api/users/1/posts`

**Response**:
```json
[
  {
    "id": 1,
    "user_id": 1,
    "content": "This is my first post!",
    "image": "url_to_image",
    "created_at": "2024-12-11T00:00:00.000000Z",
    "updated_at": "2024-12-11T00:00:00.000000Z"
  }
]
```

---

### **19. Unfollow User (DELETE /api/users/{id}/unfollow)**
Berhenti mengikuti pengguna dengan ID tertentu.

**Method**: DELETE  
**URL**: `http://your-api-url/api/users/2/unfollow`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Unfollowed successfully."
}
```

---

### **20. Delete Comment (DELETE /api/comments/{id})**
Menghapus komentar tertentu.

**Method**: DELETE  
**URL**: `http://your-api-url/api/comments/1`

**Headers**:
- `Authorization: Bearer your_generated_token`

**Response**:
```json
{
  "message": "Comment deleted successfully."
}
```

---

Dengan contoh request ini, Anda bisa langsung mengujinya di Postman sesuai dengan endpoint yang Anda butuhkan. Pastikan Anda sudah memiliki token yang valid untuk endpoint yang memerlukan autentikasi.