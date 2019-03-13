import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import{ForgotComponent} from './components/forgot/forgot.component';
import{ResetComponent} from './components/reset/reset.component';
import{DashboardComponent} from './components/dashboard/dashboard.component';
// import{RemainderComponent} from  './components/dashboard/dashboard.component';
// import{NotesComponent} from'./components/dashboard/dashboard.component';
/**
 * const which defines variables
 */
const routes: Routes = [
{path : '' ,component :LoginComponent},
{path : 'login',component : LoginComponent},
{path :'register',component :RegisterComponent},
{path :'forgot',component : ForgotComponent},
{path :'reset',component :ResetComponent},
{path :'dashboard',component :DashboardComponent},

// { path: '', component: Notes, data: { title: 'NotesComponent' } },
// { path: 'first', component: Notes, data: { title: 'NotesComponent' } },
// { path: 'second', component: Remainder, data: { title: 'RemainderComponent' } }
];


/**
 * The forRoot() method returns an NgModule and its provider dependencies.
 */
@NgModule({
imports: [RouterModule.forRoot(routes)],
exports: [RouterModule],
declarations: []
})
export class AppRoutingModule { }