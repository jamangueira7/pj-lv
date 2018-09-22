<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title">Erick {{replied}}</span>
            <blockquote>
                Vero dolorem maiores unde quidem dolorem facilis.Veritatis vel excepturi sunt quo vel aut. Quo vel voluptatem non commodi quis animi a. Quos ipsam totam est qui et vel. Non adipisci totam tenetur in ut aut doloremque est.
            </blockquote>
        </div>

        <div class="card-content">
            <span class="card-title">Erick {{replied}}</span>
            <blockquote>
                Vero dolorem maiores unde quidem dolorem facilis.Veritatis vel excepturi sunt quo vel aut. Quo vel voluptatem non commodi quis animi a. Quos ipsam totam est qui et vel. Non adipisci totam tenetur in ut aut doloremque est.
            </blockquote>
        </div>

        <div class="card-content">
            <span class="card-title">Erick {{replied}}</span>
            <blockquote>
                Vero dolorem maiores unde quidem dolorem facilis.Veritatis vel excepturi sunt quo vel aut. Quo vel voluptatem non commodi quis animi a. Quos ipsam totam est qui et vel. Non adipisci totam tenetur in ut aut doloremque est.
            </blockquote>
        </div>

        <div class="card grey lighten-4">
            <div class="card-content">
                <span class="card-title">{{reply}}</span>
                <form>
                    <div class="input-field">
                        <textarea rows="10" class="materialize-textarea" :placeholder="yourAnswer"></textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">{{send}}</button>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
            props:[
                'replied',
                'reply',
                'yourAnswer',
                'send'
    ]
    }
</script>
