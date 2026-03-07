import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { RegisterComponent } from './register/register.component';
import { AvailableRoomsComponent } from './available-rooms/available-rooms.component';
import { ReservationComponent } from './reservation/reservation.component';
import { SignUpComponent } from './sign-up/sign-up.component';
import { CheckReservationComponent } from './check-reservation/check-reservation.component';
const routes: Routes = [
  {path:'',component:HomeComponent},
  {path:'register',component:RegisterComponent},
  {path:'available',component:AvailableRoomsComponent},
  {path:'sign-up',component:SignUpComponent},
  {path:'reservation',component:ReservationComponent},
  {path:'check',component:CheckReservationComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
