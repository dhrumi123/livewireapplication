<?php

it('has no use of dd', function () {
    expect(['dd', 'dump', 'ray'])->not->toBeUsed();
});


it('has no use of destroy', function () {
    expect(['delete'])->not->toBeUsed();
});
