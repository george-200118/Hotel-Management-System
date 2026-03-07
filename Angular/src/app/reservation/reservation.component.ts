import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {
  reservationForm: FormGroup;
  Is_Error: boolean = false;
  base_url = "http://localhost:8000/api/";
  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.reservationForm = fb.group({
      Name: ['', Validators.required],
      Room_Number: ['', Validators.required],
      Check_In: ['', Validators.required],
      Check_Out: ['', Validators.required]
    });
   }

  ngOnInit() {
  }
add_reservation(reservationForm){
  if (this.reservationForm.invalid) {
    this.Is_Error = true;
    console.log('Invalid Reservation');
    return;
  }
  const headers = new HttpHeaders();
  headers.append('Content-Type', 'multipart/form-data');
  headers.append('Accept', 'application/json');
  let options = {
    headers: headers,
  };
  this.http.post(this.base_url + 'save-customer', reservationForm.value, options).subscribe((data) => {
    console.log(data);
    this.reservationForm.reset();
    alert('Contact Query Successfully Send');
  });
}
}
