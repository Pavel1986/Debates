
/** User indexes **/
db.getCollection("User").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** User indexes **/
db.getCollection("User").ensureIndex({
  "usernameCanonical": NumberInt(1)
},{
  "unique": true
});

/** User indexes **/
db.getCollection("User").ensureIndex({
  "emailCanonical": NumberInt(1)
},{
  "unique": true
});

/** system.users indexes **/
db.getCollection("system.users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** system.users indexes **/
db.getCollection("system.users").ensureIndex({
  "user": NumberInt(1),
  "userSource": NumberInt(1)
},{
  "unique": true
});

/** User records **/
db.getCollection("User").insert({
  "_id": ObjectId("548019ffdb304b4a047b23c6"),
  "credentialsExpired": false,
  "email": "test@mail.com",
  "emailCanonical": "test@mail.com",
  "enabled": true,
  "expired": false,
  "lastLogin": ISODate("2014-12-23T10:53:09.0Z"),
  "locked": false,
  "password": "EJrhhlKodlIEHpf+0U2I5np3/PvAauCNdYowUHCdjyAHKjedfATeIihHkX83LwyuByyI56Qis34gB/aKQ6TgUg==",
  "roles": [
    
  ],
  "salt": "oreehdq6lz448sc444k4o0gs0w80g04",
  "username": "test",
  "usernameCanonical": "test"
});
db.getCollection("User").insert({
  "_id": ObjectId("54803e78db304b7c0f7b23c6"),
  "credentialsExpired": false,
  "email": "mail@mail.com",
  "emailCanonical": "mail@mail.com",
  "enabled": true,
  "expired": false,
  "lastLogin": ISODate("2014-12-22T13:30:48.0Z"),
  "locked": false,
  "password": "aOPbx8WXSmGbS1HeKLA5eQ3HEEhNJSUtxMof/itFiiy3oR9p0Vvz1j7iRlTp6OFPjMmtpo+zk9jYRu/2G5mC4w==",
  "roles": [
    
  ],
  "salt": "819nrqb0jvs48goows8kc4sw00kww08",
  "username": "mail",
  "usernameCanonical": "mail"
});
db.getCollection("User").insert({
  "_id": ObjectId("5491394ddb304b4b047b23c6"),
  "confirmationToken": "CB9U_Xr4V5kMZCeHPVXwamZ9FNnDWvVS0wdr7qNbNlE",
  "credentialsExpired": false,
  "email": "tester@gmail.com",
  "emailCanonical": "tester@gmail.com",
  "enabled": true,
  "expired": false,
  "lastLogin": ISODate("2014-12-17T08:05:33.0Z"),
  "locked": false,
  "password": "I1Sfpf+AWTbv4ug+0U1Ck3NTgBcNsSZQh+prGUnRmOLXeReTnjIfLHE/tVL2iQDHv2pVySJMhlwOg/LW+2CQIw==",
  "passwordRequestedAt": ISODate("2014-12-17T08:14:45.0Z"),
  "roles": [
    
  ],
  "salt": "ov64q67hxz44woo888w4w0cock4c0os",
  "username": "tester",
  "usernameCanonical": "tester"
});
db.getCollection("User").insert({
  "_id": ObjectId("54917b1ddb304b4e047b23c6"),
  "credentialsExpired": false,
  "email": "seqq@inbox.lv",
  "emailCanonical": "seqq@inbox.lv",
  "enabled": true,
  "expired": false,
  "lastLogin": ISODate("2014-12-17T12:46:21.0Z"),
  "locked": false,
  "password": "Cpq+i3k5wGORekKQatS8aWi3XBtCC1mJ0ahkDtY1R7nLo7Uhyd0huDBr+xi3FowZCS2wlD1aQhgaJx/vCKMKOA==",
  "roles": [
    
  ],
  "salt": "4i5ziqqpdns4ok8cg4skw8ws0s4gc0s",
  "username": "seqq@inbox.lv",
  "usernameCanonical": "seqq@inbox.lv"
});
db.getCollection("User").insert({
  "_id": ObjectId("549934fbdb304b91067b23c6"),
  "credentialsExpired": false,
  "email": "name@emal.com",
  "emailCanonical": "name@emal.com",
  "enabled": true,
  "expired": false,
  "lastLogin": ISODate("2014-12-23T09:27:28.0Z"),
  "locked": false,
  "password": "QeB+T9qDMU6f9OUI567tv49teM118wYhNv4dJDdH8aSW15scGqgUlneM4zDo4OO37LpJifR5IZqMpeZze6Esjw==",
  "roles": [
    
  ],
  "salt": "oxiuof6p0uo8s00c800okkw8og0occ0",
  "username": "name@emal.com",
  "usernameCanonical": "name@emal.com"
});
db.getCollection("User").insert({
  "_id": ObjectId("54993871db304bcf077b23c6"),
  "username": "test@mail.com",
  "usernameCanonical": "test@mail.com",
  "email": "test@mail.com1",
  "emailCanonical": "test@mail.com1",
  "enabled": true,
  "salt": "nwk2snmssn40g8c4swww8gww000oogk",
  "password": "FFrY3bWKH+M/2bI5Dw8P/+DNAZc96b6wgjjPnIcox1bZBT8w0v0W4cEePdkeM0Fl04l49ZmHPNVuU3bM5aykOw==",
  "locked": false,
  "expired": false,
  "roles": [
    
  ],
  "credentialsExpired": false
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "debates.User",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "usernameCanonical": NumberInt(1)
  },
  "unique": true,
  "ns": "debates.User",
  "w": NumberInt(1),
  "name": "usernameCanonical_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "emailCanonical": NumberInt(1)
  },
  "unique": true,
  "ns": "debates.User",
  "w": NumberInt(1),
  "name": "emailCanonical_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "debates.system.users",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "user": NumberInt(1),
    "userSource": NumberInt(1)
  },
  "unique": true,
  "ns": "debates.system.users",
  "name": "user_1_userSource_1"
});

/** system.users records **/
db.getCollection("system.users").insert({
  "_id": ObjectId("548b01ac809f58364a2dcf43"),
  "user": "root",
  "readOnly": false,
  "pwd": "1d6a0f1ffa9ec2c4e45714611d9244c9"
});
