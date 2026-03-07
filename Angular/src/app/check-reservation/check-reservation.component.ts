import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Component({
  selector: 'app-check-reservation',
  templateUrl: './check-reservation.component.html',
  styleUrls: ['./check-reservation.component.css']
})
export class CheckReservationComponent implements OnInit {
checkForm:FormGroup;
Is_Error:boolean=false;
Name_Not_Found:boolean=false;
get_reservation:any
get_name:any

base_url = "http://localhost:8000/api/";
  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.checkForm = fb.group({
      Name: ['', Validators.required]
    });
   }

  ngOnInit() {
  }
check(checkForm){
  if (this.checkForm.invalid) {
    this.Is_Error = true;
    console.log('Name Required');
    return;
  }
  const headers = new HttpHeaders();
  headers.append('Content-Type', 'multipart/form-data');
  headers.append('Accept', 'application/json');
  let options = {
    headers: headers,
  };
  this.http.post(this.base_url + 'select-name', checkForm.value, options).subscribe((data) => {
    console.log(data);
    this.checkForm.reset();
    let res=Array.from(Object.keys(data),k=>data[k]);
    if(res[0]=='true'){
      this.get_name=res[2];
    }
    console.log(this.get_name);
  });
  this.http.post(this.base_url + 'check-reservation', checkForm.value, options).subscribe((data) => {
    this.checkForm.reset();
    let res=Array.from(Object.keys(data),k=>data[k]);
    if(res[2].length==0){
    this.Name_Not_Found=true;
    console.log('Name Does Not Have A Reservation');
    }
    else{
      this.get_reservation=res[2][0]['reservation'];
    }
    console.log(this.get_reservation);
  });
}
}
