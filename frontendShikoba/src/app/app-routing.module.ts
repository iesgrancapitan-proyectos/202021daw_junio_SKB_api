import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { XyzComponent} from './xyz/xyz.component'
import { CotutoriasComponent} from './cotutorias/cotutorias.component'
import { PartesComponent} from './partes/partes.component'

const routes: Routes = [
  {path: '', redirectTo: '/home', pathMatch: 'full'},
  {path: 'home', component: XyzComponent},
  {path: 'index', component: IndexComponent},
  {path: 'cotutorias', component: CotutoriasComponent},
  {path: 'partes', component: PartesComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
