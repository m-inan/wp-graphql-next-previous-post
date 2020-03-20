# WPGraphql Next-Previous Post

When using `wp-graphql`, you can use this package to bring the next and previous articles in the post.

### Installation

```sh
cd wp-content/plugins
git clone --branch stable https://github.com/m-inan/wp-graphql-next-previous-post.git
```

### Usage

```graphql
query Post {
    post(id: 1, idType: DATABASE_ID) {
        title
        next {
            title
        }
        previous {
            title
        }
    }
}
```

### Dependencies

No Dependencies.

### Reporting Issues

If believe you've found an issue, please [report it](https://github.com/m-inan/wp-graphql-next-previous-post/issues) along with any relevant details to reproduce it.

### Asking for help

Please do not use the issue tracker for personal support requests. Instead, use StackOverflow.

### Contributions

Yes please! Feature requests / pull requests are welcome.
