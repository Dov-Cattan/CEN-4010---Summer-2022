/*
    CRUD Functions
*/

app_firebase.databaseApi = {
    create: fnCreate,
    read: fnRead,
    update: fnUpdate,
    delete: fnDelete
}

app.listen(5678, () => { 
  console.log("Server is running at http://localhost:"  + 5678);
})