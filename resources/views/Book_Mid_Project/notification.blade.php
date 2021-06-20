@extends('Book_Mid_Project._layout_2')
@section('content')

<style>
    body {
        background-color: #fcfcfc;
    }

    .rowNotification {
        margin: auto;
        padding: 30px;
        width: 80%;
        display: flex;
        flex-flow: column;

        .card {
            width: 100%;
            margin-bottom: 5px;
            display: block;
            transition: opacity 0.3s;
        }
    }


    .card-body {
        padding: 0.5rem;

        table {
            width: 100%;

            tr {
                display: flex;

                td {
                    a.btn {
                        font-size: 0.8rem;
                        padding: 3px;
                    }
                }

                td:nth-child(2) {
                    text-align: right;
                    justify-content: space-around;
                }
            }
        }

    }

    .card-title:before {
        display: inline-block;
        font-family: 'Font Awesome\ 5 Free';
        font-weight: 900;
        font-size: 1.1rem;
        text-align: center;
        border: 2px solid grey;
        border-radius: 100px;
        width: 30px;
        height: 30px;
        padding-bottom: 3px;
        margin-right: 10px;
    }

    .notification-invitation {
        .card-body {
            .card-title:before {
                color: #90CAF9;
                border-color: #90CAF9;
                content: "\f007";
            }
        }
    }

    .notification-warning {
        .card-body {
            .card-title:before {
                color: #FFE082;
                border-color: #FFE082;
                content: "\f071";
            }
        }
    }

    .notification-danger {
        .card-body {
            .card-title:before {
                color: #FFAB91;
                border-color: #FFAB91;
                content: "\f00d";
            }
        }
    }

    .notification-reminder {
        .card-body {
            .card-title:before {
                color: #CE93D8;
                border-color: #CE93D8;
                content: "\f017";
            }
        }
    }

    .card.display-none {
        display: none;
        transition: opacity 2s;
    }
</style>

<div class="rowNotification notification-container">
    <h2 class="text-center">My Notifications</h2>
    <p class="dismiss text-right"><a id="dismiss-all" href="#">Dimiss All</a></p>
    <div class="card notification-card notification-invitation">
        <div class="card-body">
            <table>
                <tr>
                    <td style="width:70%">
                        <div class="card-title">Shop1 invited you to join a '<b>Contest</b>'</div>
                    </td>
                    <td style="width:30%">
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card notification-card notification-warning">
        <div class="card-body">
            <table>
                <tr>
                    <td style="width:70%">
                        <div class="card-title">Your payment for '<b>Book Name</b>' has completed</div>
                    </td>
                    <td style="width:30%">
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card notification-card notification-danger">
        <div class="card-body">
            <table>
                <tr>
                    <td style="width:70%">
                        <div class="card-title">Failed payment to purchase '<b>Book Name</b>'</div>
                    </td>
                    <td style="width:30%">
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card notification-card notification-reminder">
        <div class="card-body">
            <table>
                <tr>
                    <td style="width:70%">
                        <div class="card-title">You have saved <b>2</b> Books for Lookup</div>
                    </td>
                    <td style="width:30%">
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</div>


<script>
    const dismissAll = document.getElementById('dismiss-all');
    const dismissBtns = Array.from(document.querySelectorAll('.dismiss-notification'));

    const notificationCards = document.querySelectorAll('.notification-card');

    dismissBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault;
            var parent = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
            parent.classList.add('display-none');
        })
    });

    dismissAll.addEventListener('click', function(e) {
        e.preventDefault;
        notificationCards.forEach(card => {
            card.classList.add('display-none');
        });
        const row = document.querySelector('.notification-container');
        const message = document.createElement('h4');
        message.classList.add('text-center');
        message.innerHTML = 'All caught up!';
        row.appendChild(message);
    })
</script>

@endsection