# Rotas da aplicação
**Método:** `POST`

**Endpoint:** `/user`

**Request Payload (application/json):**
```
   {
       "name": "Fernando",
       "document": "558.895.950-75",
       "email": "teste@gmail.com",
       "type": "comum"
   }

   {
       "name": "Loja",
       "document": "86.681.871/0001-33",
       "email": "lojateste@gmail.com",
       "type": "lojista"
   }
```

**Response (201 - Created):**
```
{
    "id": "30c23497-a39b-4234-8e31-e9b3210d4c73",
    "document": "558.895.950-75",
    "name": "Rafael",
    "email": "to1433433t@gmail.com",
    "type": "user"
}
```

**Response (400 - Bad Request):**
```
{
    "errors": {
        "email": [
            "The email has already been taken."
        ],
        "cpf": [
            "The document has already been taken."
        ]
    }
}
```

**Response (422 - Unprocessable Entity):**
```
{
    "error": "Invalid Document"
}
```

**Response (422 - Unprocessable Entity):**
```
{
    "error": "Invalid E-mail"
}
```

**Endpoint:** `/deposit`

**Request Payload (application/json):**
```
{
    "userId": "30c23497-a39b-4234-8e31-e9b3210d4c73",
    "value": 2000.93
}
```

**Response (200 - OK):**
```
{
    "userId": "30c23497-a39b-4234-8e31-e9b3210d4c73",
    "balance": 2000.93
}
```

**Response (404 - Not found):**
```
{
    "errors": "Usuário não existe"
}
```

**Endpoint:** `/transaction`

**Request Payload (application/json):**
```
{
    "payer": "30c23497-a39b-4234-8e31-e9b3210d4c73",
    "payee": "2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908",
    "value": 500.47
}
```

**Response (200 - OK):**
```
{
    "id": "39e3e803-34f8-46f1-a7a8-42ee75ba06b5",
    "payee": "2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908",
    "payer": "30c23497-a39b-4234-8e31-e9b3210d4c73",
    "value": 500.47
}
```

**Response (400 - Bad Request):**
```
{
    "errors": Não é possível transferir dinheiro para você mesmo!"
}
```

**Response (404 - Not Found):**
```
{
    "errors": User not found"
}
```
