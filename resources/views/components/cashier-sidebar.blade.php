
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li>
        <a href="{{ route('cashier.cashier.dashboard') }}" class="nav-link {{ Route::is('cashier.cashier.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

<li>

    <a data-toggle="collapse" data-target="#setting" href=""
        class="nav-link ">
        <i class="nav-icon fas fa-user"></i>
        <p>Basic Setting
            <span class="badge badge-info right"></span>
        </p>
    </a>

<div id="setting" class="collapse">


<ul class="branch-menu" data-toggle="Cashier-company">


       <a href="{{ route('cashier.company.index') }}"class="nav-link {{ Route::is('cashier.company.index') ? 'active' : '' }}">

        <i class="nav-icon fas fa-user-tag">Company</i>
    </a>




     </ul>
<ul class="branch-menu" >

   <a href="{{ route('cashier.branch.index') }}"  class="nav-link {{ Route::is('cashier.branch.index') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-tag"></i> Branch List
    </a>

    </ul>
    <ul class="branch-menu" >

        <a href="{{ route('cashier.teller.index') }}"  class="nav-link {{ Route::is('cashier.teller.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tag"></i>
            Teller</a>

         </ul>

         <ul class="branch-menu" >

            <a href="{{ route('cashier.till.index') }}"  class="nav-link {{ Route::is('cashier.till.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tag"></i>Till Number(Agent Code)</a>

             </ul>

             <ul class="branch-menu" >

                <a href="{{ route('cashier.capital.index') }}"  class="nav-link {{ Route::is('cashier.capital.index') ? 'active' : '' }}"><i class="nav-icon fas fa-user-tag"></i>Capital</a>

                 </ul>


</div>


</li>
<li>
    <a  data-toggle="collapse" data-target="#transaction"href=""
        class="nav-link">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>Transaction
            <span class="badge badge-success right"></span>
        </p>
    </a>

</a>

<div id="transaction" class="collapse"  >

        <ul>
        <a  class="btn btn-primary dropdown-toggle"style="width: 80%; color:whitesmoke; margin-bottom:5px" data-toggle="collapse" data-target="#deposit" href=""  class="nav-link ">
            <i class="nav-icon fas fa-user-tag"></i>  Deposit
         </a>
         <div id="deposit" class="collapse">

        <ul>
            <a href="{{ route('cashier.deposit.index') }}"  class="nav-link {{ Route::is('cashier.deposit.index') ? 'active' : '' }}">Customer Deposit</a>

        </ul>
        <ul>
          <a href="#">Transaction Records</a>

        </ul>
         </div>
        </ul>

<ul>
         <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px" data-toggle="collapse" data-target="#withdraw" href=""  class="nav-link ">
            <i class="nav-icon fas fa-user-tag"></i>  Withdraw
         </a>
         <div id="withdraw" class="collapse">

        <ul>
            <a href="{{ route('cashier.withdraw.index') }}"  class="nav-link {{ Route::is('cashier.withdraw.index') ? 'active' : '' }}">
            Customer Withdraw</a>
        </ul>
        <ul>
          <a href="#">Withdraw Records</a>

        </ul>
         </div>
        </ul>

        <ul>
            <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px" data-toggle="collapse" data-target="#transfer" href=""  class="nav-link ">
                <i class="nav-icon fas fa-user-tag "></i>  Transfer
             </a>
             <div id="transfer" class="collapse">
                <ul>
                    <a href="{{ route('cashier.transfer.index') }}" class=" {{ Route::is('cashier.transfer.index') ? 'active' : '' }}">Transfer Cash</a>

                  </ul>
            <ul>
            <a href="#">Transfer Float</a>
            </ul>
            <ul>
                <a href="#">Transfer Commission</a>
            </ul>

             </div>
            </ul>

            <ul>
                <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px" data-toggle="collapse" data-target="#float" href=""  class="nav-link ">
                    <i class="nav-icon fas fa-user-tag "></i>  Float
                 </a>
                 <div id="float" class="collapse">

                <ul>
                    <a href="{{ route('cashier.float.index') }}"  class="nav-link {{ Route::is('cashier.float.index') ? 'active' : '' }}">Add Float</a>
                 </ul>
                <ul>
                    <a href="#">View Added Float</a>
                </ul>
                <ul>
                    <a href="#">View Float Flow</a>

                  </ul>
                 </div>
                </ul>


            <ul>
                <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px" data-toggle="collapse" data-target="#cash" href=""  class="nav-link ">
                    <i class="nav-icon fas fa-user-tag "></i> Cash
                 </a>
                 <div id="cash" class="collapse">

                <ul>
                    <a href="{{ route('cashier.cash.index') }}" class=" {{ Route::is('cashier.cash.index') ? 'active' : '' }}">Add Cash</a>
                 </ul>
                <ul>
                    <a href="#">View Added Cash</a>
                </ul>
                <ul>
                    <a href="#">View Cash Flow</a>

                  </ul>
                 </div>
                </ul>

                <ul>
                    <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; " data-toggle="collapse" data-target="#balance" href=""  class="nav-link ">
                        <i class="nav-icon fas fa-user-tag "></i> Balance
                     </a>
                     <div id="balance" class="collapse">
                        <ul>
                            <a href="{{ route('cashier.balance.index') }}" class=" {{ Route::is('cashier.balance.index') ? 'active' : '' }}">Cash Balance</a>
                        </ul>
                    <ul>
                        <a href="#">Float Balance</a>
                     </ul>

                    <ul>
                        <a href="#">Commission Balance </a>
                      </ul>
                     </div>
                    </ul>
    </div>
</li>

    <a data-toggle="collapse" data-target="#accounting"href=""
        class="nav-link">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>Accounting
            <span class="badge badge-success right"></span>
        </p>
    </a>

    <div id="accounting" class="collapse">


                <ul>
                    <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px " data-toggle="collapse" data-target="#income" >
                        <i class="nav-icon fas fa-user-tag "></i> Income
                     </a>
                     <div id="income" class="collapse">
                        <ul>
                            <a href="{{ route('cashier.income_category.index') }}" class=" {{ Route::is('cashier.income_category.index') ? 'active' : '' }}">Register Income Category</a>
                         </ul>
                        <ul>
                            <a href="{{ route('cashier.income.index') }}" class=" {{ Route::is('cashier.income.index') ? 'active' : '' }}">Record Income</a>
                        </ul>

                     </div>
        </ul>
        <ul>
            <a  class="btn btn-primary dropdown-toggle" style="width: 80%; color:whitesmoke; margin-bottom:5px " data-toggle="collapse" data-target="#expenses" >
                <i class="nav-icon fas fa-user-tag "></i> Expenses
             </a>
             <div id="expenses" class="collapse">
                <ul>
                    <a href="{{ route('cashier.expenses_category.index') }}" class=" {{ Route::is('cashier.expenses_category.index') ? 'active' : '' }}">Register Expenses Category</a>
                </ul>
                <ul>
                    <a href="{{ route('cashier.expenses.index') }}" class=" {{ Route::is('cashier.expenses.index') ? 'active' : '' }}">Record Expenses</a>
                </ul>
             </div>

            </ul>
    </div>

