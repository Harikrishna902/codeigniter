import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import{ForgotComponent} from './components/forgot/forgot.component';
import{ResetComponent} from './components/reset/reset.component';
import{DashboardComponent} from './components/dashboard/dashboard.component';
import { NotesComponent } from './components/notes/notes.component';
import { ReminderComponent } from './components/reminder/reminder.component';
import { LabelComponent } from './components/label/label.component';
//import { EditnotesComponent } from './components/editnotes/editnotes.component';
import { EditlabelsComponent } from './components/editlabels/editlabels.component';
import { ArchiveComponent } from './components/archive/archive.component';
import {TrashComponent}from './components/trash/trash.component';
import { SearchComponent } from './components/search/search.component';
//import { AuthGuard } from "./auth.guard";
/**
 * const which defines variables
 */
const routes: Routes = [
{path : '' ,component :LoginComponent},
{path : 'login',component : LoginComponent},
{path :'register',component :RegisterComponent},
{path :'forgot',component : ForgotComponent},
{path :'reset',component :ResetComponent},
{path :'dashboard',component :DashboardComponent,
children: [
{
    path: "notes",
    component: NotesComponent,
},
{
    path:"reminder",
    component: ReminderComponent,
    
  },
  {
    path:"label",
    component: LabelComponent,
    
  },
  {
    path:"editlabels",
    component:EditlabelsComponent,
    
  },
  {
    path:"archive",
    component:ArchiveComponent,
    
  },
  {
    path:"trash",
    component: TrashComponent,
    
  },
  
  {

  path:"search",
  component: SearchComponent,
  },
  


]
}
]

/**
 * The forRoot() method returns an NgModule and its provider dependencies.
 */
@NgModule({
imports: [RouterModule.forRoot(routes)],
exports: [RouterModule],
declarations: []
})

export class AppRoutingModule { }