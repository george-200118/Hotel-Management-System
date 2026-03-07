import { Component, OnInit } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import {  FormGroup,FormBuilder,Validators } from '@angular/forms';
@Component({
  selector: 'app-available-rooms',
  templateUrl: './available-rooms.component.html',
  styleUrls: ['./available-rooms.component.css']
})
export class AvailableRoomsComponent implements OnInit {
  checkForm:FormGroup;
  Is_Error:boolean=false;
  base_url="http://localhost:8000/api/";
  all_rooms:any;
  b:any;
  all_rooms_array: unknown[];
  constructor(private fb:FormBuilder,private http:HttpClient) { 
    this.checkForm=fb.group({
      Check_In:['',Validators.required],
      Check_Out:['',Validators.required]
    });
  }

  ngOnInit() {
    
}
check_room(checkForm){
  if (this.checkForm.invalid) {
    this.Is_Error=true;
    console.log('Invalid signup form');
    return;
  }
  const headers = new HttpHeaders();
  headers.append('Content-Type', 'multipart/form-data');
  headers.append('Accept', 'application/json');
  let options = {
    headers: headers,
  };
  this.http.post(this.base_url+'rooms-available',checkForm.value,options).subscribe((data)=>{
    let res=Array.from(Object.keys(data),k=>data[k]);
    if(res[0]=='true'){
    this.all_rooms=res[2];
    }
    console.log(this.all_rooms);
     });
}
}
