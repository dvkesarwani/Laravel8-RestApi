<template>
        <div>
            <h4 class="text-center font-weight-bold">Novels</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="novel in novels">
                    <td>{{novel.title}}</td>
                    <td>{{novel.author}}</td>
                    <td>{{novel.price}}</td>
             
                </tr>
                </tbody>
            </table>
        </div>

    </template>

    <script>
        export default {
            name: "Novels",
            mounted() {
            },
            }
        }
    </script>