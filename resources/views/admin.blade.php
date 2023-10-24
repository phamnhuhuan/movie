<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Admin</title>
</head>
<style>
    .tags-input-wrapper {
        background: transparent;
        padding: 3px;
        border-radius: 4px;
        width: 100%;
        border: 1px solid #ccc
    }

    .tags-input-wrapper input {
        border: none;
        background: transparent;
        outline: none;
        max-width: 1000px;
        margin-left: 8px;
    }

    .tags-input-wrapper .tag {
        display: inline-block;
        background-color: #fa0e7e;
        color: white;
        border-radius: 40px;
        padding: 0px 3px 0px 7px;
        margin-right: 5px;
        margin-bottom: 5px;
        box-shadow: 0 5px 15px -2px rgba(250, 14, 126, .7)
    }

    .tags-input-wrapper .tag a {
        margin: 0 7px 3px;
        display: inline-block;
        cursor: pointer;
    }
</style>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="{{ url('/') }}" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Laravel</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ url('dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/cate') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Danh muc</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('cate.create') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Thêm Danh muc</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/genre') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Genre</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('genre.create') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Thêm Genre</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('movie.index') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">video</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('movie.create') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Tạo video</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">

            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">
                        <form action="{{ url('logout') }}" method="post">
                            @csrf
                            <button type="submit" style="border: none">Logout</button>
                        </form>
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Laravel</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset('img/icon.png') }}">
            </a>
        </nav>
        @yield('content')
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        new Morris.Donut({

            element: 'members-tickets',

            data: [{
                    label: 'Online',
                    value: {{'12'}}
                },
                {
                    label: 'Last Month',
                    value: {{$count_last_month}}
                },
                {
                    label: 'This Month',
                    value: {{$count_this_month}}
                },
                {
                    label: 'Year',
                    value: {{$count_year}}
                }
            ]

        });
    </script>
    <script>
        $(document).ready(function() {
            $('[title="Hosted on free web hosting 000webhost.com. Host your own website for FREE."]').hide();
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script>
        CKEDITOR.replace('video_movie');
    </script>


    <script>
        var loadFile_post = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var img_post = document.getElementById('img_post');
                img_post.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        var loadFile_teacher = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var img_teacher = document.getElementById('img_teacher');
                img_teacher.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        (function() {

            "use strict"


            // Plugin Constructor
            var TagsInput = function(opts) {
                this.options = Object.assign(TagsInput.defaults, opts);
                this.init();
            }

            // Initialize the plugin
            TagsInput.prototype.init = function(opts) {
                this.options = opts ? Object.assign(this.options, opts) : this.options;

                if (this.initialized)
                    this.destroy();

                if (!(this.orignal_input = document.getElementById(this.options.selector))) {
                    console.error("tags-input couldn't find an element with the specified ID");
                    return this;
                }

                this.arr = [];
                this.wrapper = document.createElement('div');
                this.input = document.createElement('input');
                init(this);
                initEvents(this);

                this.initialized = true;
                return this;
            }

            // Add Tags
            TagsInput.prototype.addTag = function(string) {

                if (this.anyErrors(string))
                    return;

                this.arr.push(string);
                var tagInput = this;

                var tag = document.createElement('span');
                tag.className = this.options.tagClass;
                tag.innerText = string;

                var closeIcon = document.createElement('a');
                closeIcon.innerHTML = '&times;';

                // delete the tag when icon is clicked
                closeIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    var tag = this.parentNode;

                    for (var i = 0; i < tagInput.wrapper.childNodes.length; i++) {
                        if (tagInput.wrapper.childNodes[i] == tag)
                            tagInput.deleteTag(tag, i);
                    }
                })


                tag.appendChild(closeIcon);
                this.wrapper.insertBefore(tag, this.input);
                this.orignal_input.value = this.arr.join(',');

                return this;
            }

            // Delete Tags
            TagsInput.prototype.deleteTag = function(tag, i) {
                tag.remove();
                this.arr.splice(i, 1);
                this.orignal_input.value = this.arr.join(',');
                return this;
            }

            // Make sure input string have no error with the plugin
            TagsInput.prototype.anyErrors = function(string) {
                if (this.options.max != null && this.arr.length >= this.options.max) {
                    console.log('max tags limit reached');
                    return true;
                }

                if (!this.options.duplicate && this.arr.indexOf(string) != -1) {
                    console.log('duplicate found " ' + string + ' " ')
                    return true;
                }

                return false;
            }

            // Add tags programmatically 
            TagsInput.prototype.addData = function(array) {
                var plugin = this;

                array.forEach(function(string) {
                    plugin.addTag(string);
                })
                return this;
            }

            // Get the Input String
            TagsInput.prototype.getInputString = function() {
                return this.arr.join(',');
            }


            // destroy the plugin
            TagsInput.prototype.destroy = function() {
                this.orignal_input.removeAttribute('hidden');

                delete this.orignal_input;
                var self = this;

                Object.keys(this).forEach(function(key) {
                    if (self[key] instanceof HTMLElement)
                        self[key].remove();

                    if (key != 'options')
                        delete self[key];
                });

                this.initialized = false;
            }

            // Private function to initialize the tag input plugin
            function init(tags) {
                tags.wrapper.append(tags.input);
                tags.wrapper.classList.add(tags.options.wrapperClass);
                tags.orignal_input.setAttribute('hidden', 'true');
                tags.orignal_input.parentNode.insertBefore(tags.wrapper, tags.orignal_input);
            }

            // initialize the Events
            function initEvents(tags) {
                tags.wrapper.addEventListener('click', function() {
                    tags.input.focus();
                });


                tags.input.addEventListener('keydown', function(e) {
                    var str = tags.input.value.trim();

                    if (!!(~[9, 13, 188].indexOf(e.keyCode))) {
                        e.preventDefault();
                        tags.input.value = "";
                        if (str != "")
                            tags.addTag(str);
                    }

                });
            }


            // Set All the Default Values
            TagsInput.defaults = {
                selector: '',
                wrapperClass: 'tags-input-wrapper',
                tagClass: 'tag',
                max: null,
                duplicate: false
            }

            window.TagsInput = TagsInput;

        })();

        var tagInput1 = new TagsInput({
            selector: 'tag-input1',
            duplicate: false,
            max: 10
        });
        tagInput1.addData(['travel'])
    </script>
</body>

</html>
